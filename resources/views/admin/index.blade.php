@extends('layouts.admin')

@section('sub-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        Properties
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Preview</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Surface</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($properties as $property)
                                    <tr>
                                        <td></td>
                                        <td>{{ $property->title }}</td>
                                        <td>{{ $property->price }} €</td>
                                        <td>{{ $property->surface }}</td>
                                        <td>{{ $property->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ action('Admin\PropertiesController@index') }}" class="btn btn-primary btn-block">See more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
