<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class FeatureSettings extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

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
        'category_name',
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
        'category_name',
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
     * Add custom attributes to the log.
     *
     * @return array
     */
    public function customProperties(): array
    {
        return [
            'category_name' => $this->category_name,
            'category_id'   => $this->id,
        ];
    }
}
