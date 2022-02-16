<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeveloperType extends Model
{
    //
    use SoftDeletes;

    protected $table = 'developer_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'description', 'deadline', 'status', 'price'
    ];

    protected $dates = ['deleted_at'];
}
