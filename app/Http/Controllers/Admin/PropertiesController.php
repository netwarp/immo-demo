<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use Image;
use Storage;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::orderBy('updated_at', 'desc')->get();

        return response()->view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create new property';

        $action = action('Admin\PropertiesController@store');

        return response()->view('admin.properties.create_or_edit', compact('title', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //   dd($request->all());
        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'surface' => $request->get('surface'),
            'rooms' => $request->get('rooms'),
            'types' => $request->get('types'),
            'amenities' => $request->get('amenities'),
            'securities' => $request->get('securities'),
        ];

        $property = Property::create($data);

        foreach ($request->images as $image) {
            $name = $image->getClientOriginalName();
            $img = Image::make($image);
            $img->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = Storage::put("{$property->id}/$name", $image);

            $data['images'] = $path;
        }

        $property->update($data);

        return redirect()->action('Admin\PropertiesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::findOrFail($id);

        $title = 'Edit property';

        $action = action('Admin\PropertiesController@update', $property->id);

        return response()->view('admin.properties.create_or_edit', compact('property', 'title', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'surface' => $request->get('surface'),
            'rooms' => $request->get('rooms'),
            'types' => $request->get('types'),
            'amenities' => $request->get('amenities'),
            'securities' => $request->get('securities'),
        ];

        $property = Property::findOrFail($id);

        if ($request->has('images')) {
            foreach ($request->images as $image) {
                $name = $image->getClientOriginalName();
                $img = Image::make($image);
                $img->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $path = Storage::put("{$property->id}", $image);

                $data['images'][] = $path;
            }
        }

        $property->update($data);

        return redirect()->action('Admin\PropertiesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        $property->delete();

        return redirect()->action('Admin\PropertiesController@index');
    }
}
