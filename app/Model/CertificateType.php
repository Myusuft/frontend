<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CertificateType extends Model
{
    //
    protected $table = 'certificate_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'description'
    ];
}
