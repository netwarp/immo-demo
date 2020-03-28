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

        $properties = Property::orderBy('updated_at', 'desc')->limit(9)->get();

        return view('front.index', compact('properties'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function getOffers(Request $request) {
        $properties = new Property;

        if ($request->filled('service')) {
            $value = $request->get('service');
            $properties = $properties->where('service', $value);
        }

        if ($request->filled('city')) {
            $value = $request->get('city');
            $properties = $properties->where('city', $value);
        }

        if ($request->filled('min_surface')) {
            $value = $request->get('min_surface');
            $properties = $properties->where('surface', '>=', (int) $value);
        }

        if ($request->filled('min_price')) {
            $value = $request->get('min_price');
            $properties = $properties->where('price', '>=', (int) $value);
        }

        if ($request->filled('max_price')) {
            $value = $request->get('max_price');
            $properties = $properties->where('price', '<=', (int) $value);
        }

        if ($request->filled('rooms')) {
            $value = $request->get('rooms');
            $properties = $properties->where('rooms', '>=', (int) $value);
        }

        if ($request->filled('types')) {
            foreach ($request->get('types') as $key => $item)  {
                $field = "types.{$item}";
                $properties = $properties->orWhere($field, 'on');
            }
        }

        if ($request->filled('amenities')) {
            foreach ($request->get('amenities') as $key => $item)  {
                $field = "amenities.{$item}";
                $properties = $properties->orWhere($field, 'on');
            }
        }

        if ($request->filled('securities')) {
            foreach ($request->get('securities') as $key => $item)  {
                $field = "securities.{$item}";
                $properties = $properties->orWhere($field, 'on');
            }
        }

        $properties = $properties->paginate(10);

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
