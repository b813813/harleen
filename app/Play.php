<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Play extends Model
{
    use SoftDeletes;

    protected $table = 'play';

    protected $guarded = [
        'id',
        'working_area_id',
        'gcf_id',
        'rps_year',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_editing',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Nama cantik buat form Play.
     *
     * @var Array
     */
    public $nice = [
        'basin_name' => 'Basin',
        'province_name' => 'Province',
        'remark' => 'Remark',
        'analog_to' => 'Analog to',
        'analog_distance' => 'Analog distance',
        'shore' => 'Shore',
        'terrain' => 'Terrain',
        'nearby_field' => 'Nearby field',
        'nearby_infra' => 'Nearby infrastructure',
        's2_year' => 'Acquisition year',
        's2_crossline' => 'Total crossline',
        's2_line_distance' => 'Parallel intervall distance',
        'chem_sample' => 'Total sample',
        'chem_depth' => 'Range depth',
        'grav_acreage' => 'Survey acreage',
        'grav_depth' => 'Range depth',
        'resi_acreage' => 'Survey acreage',
        'update_reason' => 'Update reason',
        'delete_reason' => 'Delete reason',
    ];

    /**
     * Mengambil wilayah kerja yang memiliki Play tersebut.
     *
     * @return belongsTo
     */
    public function workingAreas()
    {
        return $this->belongsTo('App\WorkingArea');
    }

    /**
     * Play dapat memiliki banyak Lead.
     *
     * @return hasMany
     */
    public function leads()
    {
        return $this->hasMany('App\Lead');
    }

    /**
     * GCF yang dimiliki oleh Play.
     *
     * @return belongsTo
     */
    public function gcf()
    {
        return $this->belongsTo('App\Gcf');
    }
}
