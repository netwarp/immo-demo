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
        'city',
        'department',
        'description',
        'price',
        'surface',
        'rooms',
        'types',
        'amenities',
        'securities',
        'images',
    ];

    public function preview() {
        if (isset($this->images[0])) {
            $first_image = $this->images[0];
            return "/images/{$first_image}";
        }
        return 'e';
    }
}
