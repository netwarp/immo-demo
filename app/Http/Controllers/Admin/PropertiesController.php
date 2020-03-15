<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use Image;
use Storage;
use Str;

class PropertiesController extends Controller
{
    /*
     * Manage the images for the functions store and update
     */
    private function manageImageRequest(Request $request, $data, Property $property) {

        if (($request['images'])) {
            foreach ($request['images'] as $key => $file) {

                $extension = $file->extension();

                $filename = $file->getClientOriginalName();
                $filename = md5($filename);

                $image = Image::make($file);

                $complete_name = "$filename.$extension";

                $path = "properties/$property->id/$complete_name";

                $data['images'][$key] = $path;

                Storage::put($path, $image->encode());
            }

            if ($request->method() === 'PUT') {
                $updated_images = array_merge($property->images, $data['images']);
                $data['images'] = $updated_images;
            }
        }

        $property->update($data);
    }

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
     //   dd($request->all());
        $data = [
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'city' => $request->get('city'),
            'department' => $request->get('department'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'surface' => $request->get('surface'),
            'rooms' => $request->get('rooms'),
            'types' => $request->get('types'),
            'amenities' => $request->get('amenities'),
            'securities' => $request->get('securities'),
        ];

        $property = Property::create($data);

        $this->manageImageRequest($request, $data, $property);

        return redirect()->action('Admin\PropertiesController@index')->with('success', 'Property created');
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $data = [
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'city' => $request->get('city'),
            'department' => $request->get('department'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'surface' => $request->get('surface'),
            'rooms' => $request->get('rooms'),
            'types' => $request->get('types'),
            'amenities' => $request->get('amenities'),
            'securities' => $request->get('securities'),
        ];

        $property = Property::findOrFail($id);

        $this->manageImageRequest($request, $data, $property);

        return redirect()->action('Admin\PropertiesController@index')->with('success', 'Property updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        Storage::deleteDirectory("properties/{$property->id}");

        $property->delete();

        return redirect()->action('Admin\PropertiesController@index')->with('success', 'Property deleted');
    }
}
