<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class FrontController extends Controller
{
    /**
     * First page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex() {

        $properties = Property::all();

        return view('front.index', compact('properties'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProperty($slug) {
        $property = Property::where('slug', $slug)->first();

        return view('front.property', compact('property'));
    }
}
