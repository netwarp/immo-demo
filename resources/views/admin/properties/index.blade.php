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
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                        <tr>
                            <td>{{ $property->preview ?? '' }}</td>
                            <td><a href="{{ action('Admin\PropertiesController@edit', $property->id) }}">{{ $property->title ?? '' }}</a></td>
                            <td></td>
                            <td>{{ $property->created_at ?? '' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
