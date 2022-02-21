<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    //
    protected $table = 'user_datas';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'user_id', 'fullname', 'phone', 'picture_profile', 'image_cover', 'address', 'city', 'province'
    ];

}
