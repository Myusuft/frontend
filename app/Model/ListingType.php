<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ListingType extends Model
{
    //
    protected $table = 'listing_packages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','description', 'type_listing', 'image_icon'
    ];
}
