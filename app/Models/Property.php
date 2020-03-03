<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Property extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'properties';

    protected $fillable = [
        'title',
        'description',
        'price',
        'surface',
        'rooms',
        'types',
        'amenities',
        'securities',
        'images',
    ];
}
