@extends('layouts.admin')

@section('sub-content')
    <div class="card">
        <div class="card-body">
           <div class="my-2">
               <a href="{{ action('Admin\PropertiesController@create') }}" class="btn btn-primary">Create new property</a>
           </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Preview</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Surface</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                        <tr>
                            <td>
                                <a href="{{ action('Admin\PropertiesController@edit', $property->id) }}">
                                    <img src="{{ $property->preview() ?? '' }}" alt="" style="width: 200px;">
                                </a>
                            </td>
                            <td><a href="{{ action('Admin\PropertiesController@edit', $property->id) }}">{{ $property->title ?? '' }}</a></td>
                            <td>
                                <a href="{{ action('Admin\PropertiesController@edit', $property->id) }}">
                                    {{ $property->city ?? '' }} {{ $property->department ?? '' }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ action('Admin\PropertiesController@edit', $property->id) }}">
                                    {{ $property->price ?? '' }} €
                                </a>
                            </td>
                            <td>
                                <a href="{{ action('Admin\PropertiesController@edit', $property->id) }}">
                                    {{ $property->surface ?? '' }} €
                                </a>
                            </td>
                            <td>
                                <a href="{{ action('Admin\PropertiesController@edit', $property->id) }}">
                                    {{ $property->created_at ?? '' }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $properties->links() }}
        </div>
    </div>
@endsection
