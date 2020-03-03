<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class AdminController extends Controller
{
    public function index() {

        $properties = Property::orderBy('updated_at', 'desc')->limit(4)->get();

        return view('admin.index', compact('properties'));
    }
}
