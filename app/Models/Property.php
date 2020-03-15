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
        'slug',
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

    public function priceFormat() {
        if (isset($this->price)) {
            $price = (int) $this->price;
            $price = number_format($price, 0, ',', ' ');
            return $price;
        }
        return '';
    }

    public function imagesCount() {
        return count($this->images) ?? 0;
    }
}
