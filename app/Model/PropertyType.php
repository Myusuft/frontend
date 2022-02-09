<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $table = 'property_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','image_icon'
    ];
}
