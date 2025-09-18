<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'type' => 'water',
                'settings' => ['solid' => 1, 'liquid' => 4],
                'enable' => 1,
                'details' => 'state of water',
            ]
        ];

        collect($settings)->each(function ($settings) { \App\Models\FeatureSettings::create($settings); });
    }
}
