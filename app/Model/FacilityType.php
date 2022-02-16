<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacilityType extends Model
{
    //
    use SoftDeletes;

    protected $table = 'facility_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'category', 'image_icon'
    ];

    protected $dates = ['deleted_at'];
}
