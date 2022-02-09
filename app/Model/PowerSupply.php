<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PowerSupply extends Model
{
    //
    protected $table = 'power_supplies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','value'
    ];
}
