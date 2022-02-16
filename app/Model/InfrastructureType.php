<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfrastructureType extends Model
{
    //
    use SoftDeletes;

    protected $table = 'infrastructure_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'description', 'image_icon'
    ];

    protected $dates = ['deleted_at'];
}
