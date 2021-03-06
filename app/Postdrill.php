<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postdrill extends Model
{
    use SoftDeletes;

    protected $table = 'postdrill';

    protected $guarded = [
        'id',
        'working_area_id',
        'play_id',
        'postdrill_well_id',
        'prospect_survey_id',
        'gcf_id',
        'rps_year',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_editing',
        'is_pinned',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Drillable dimiliki oleh satu Play.
     *
     * @return belongsTo
     */
    public function play()
    {
        return $this->belongsTo('App\Play');
    }
}
