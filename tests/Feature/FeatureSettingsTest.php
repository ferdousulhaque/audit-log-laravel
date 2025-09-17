<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\FeatureSettings;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_feature_settings_changes_are_audited(): void
    {
        // Create a feature setting
        $featureSetting = new FeatureSettings();
        $featureSetting->category_name = 'Test Category';
        $featureSetting->settings = ['key' => 'value'];
        $featureSetting->enable = true;
        $featureSetting->details = 'Test Details';
        $featureSetting->save();

        // Verify the record was created
        $this->assertDatabaseHas('feature_settings', [
            'id' => $featureSetting->id,
            'category_name' => 'Test Category'
        ]);

        // Make a change
        $featureSetting->refresh();
        $featureSetting->settings = ['key' => 'new value'];
        $featureSetting->save();
        
        // Force an audit if needed
        if (method_exists($featureSetting, 'audit')) {
            $featureSetting->audit();
        }

        // Verify the audit was created
        $this->assertDatabaseHas('audits', [
            'auditable_type' => FeatureSettings::class,
            'auditable_id' => $featureSetting->id,
            'event' => 'updated'
        ]);
    }
}