@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <ul>
                    <li><a href="{{ action('Admin\AdminController@index') }}" class="{{ Str::contains(Route::currentRouteAction(), 'AdminController') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ action('Admin\PropertiesController@index') }}" class="{{ Str::contains(Route::currentRouteAction(), 'Properties') ? 'active' : '' }}">Properties</a></li>
                </ul>
            </div>
            <div class="col-md">
                @yield('sub-content')
            </div>
        </div>
    </div>
@endsection
