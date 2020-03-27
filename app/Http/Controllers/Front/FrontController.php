<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class FrontController extends Controller
{
    /**
     * First page
     * @return \Illuminate\View\View
     */
    public function getIndex() {

        $properties = Property::all();

        return view('front.index', compact('properties'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function getOffers(Request $request) {
        $properties = new Property;

        if ($request->filled('type')) {
            $type = $request->get('type');
            $properties = $properties->where('type', $type);
        }

        if ($request->filled('location')) {
            $location = $request->get('location');
            $properties = $properties->where('location', $location);
        }

        $properties = $properties->get();

        return view('front.offers', compact('properties'));
    }

    /**
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function getProperty($slug) {
        $property = Property::where('slug', $slug)->first();

        return view('front.property', compact('property'));
    }
}
