<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    protected $fillable = [
        'id',
        'email',
        'password',
         'ip',
        'created_at',
        'updated_at',
        'geoplugin_city' ,
         'geoplugin_regionCode' ,
            'geoplugin_areaCode' ,
            'geoplugin_countryName',
            'geoplugin_continentName' ,
            'geoplugin_timezone' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
