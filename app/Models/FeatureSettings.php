<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeatureSettings extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'settings' => 'json',
        'enable' => 'boolean'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'settings',
        'enable',
        'details'
    ];

    /**
     * Attributes that should be audited.
     *
     * @var array
     */
    protected $auditInclude = [
        'type',
        'settings',
        'enable',
        'details'
    ];

    /**
     * Excluded attributes from audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'created_at',
        'updated_at'
    ];

    /**
     * Tweak the audit data before it's saved.
     *
     * @param array $data The audit data.
     * @return array
     */
    public function transformAudit(array $data): array
    {
        $data['category_name'] = 'feature_settings';
        return $data;
    }
}
