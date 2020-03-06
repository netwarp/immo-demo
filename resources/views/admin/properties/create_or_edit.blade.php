@php
    $types = [
        'Appartement',
        'Maison',
        'Propriété',
        'Hôtel Particulier',
        'Château',
        'Ferme',
        'Bureau / Commerce',
        'Loft / Atelier',
        'Immeuble',
        'Parking',
        'Terrain',
        'Viager',
        'Chalet',
        'Villa',
        'Autre',
    ];

    $types = array_chunk($types, 5);

    $amenities = [
        'Cave',
        'Parking fermé / Box',
        'Jardin',
        'Parquet',
        'Ascenseur',
        'Garage',
        'Balcon',
        'Piscine',
        'Toilettes indépendantes',
        'Rénové',
        'Parking',
        'Terrasse',
        'Cheminée',
        'Air conditionné'
    ];

    $amenities = array_chunk($amenities, 5);

    $securities = [
        'Gardien',
        'Interphone',
        'Digicode',
    ];

    $securities = array_chunk($securities, 5);

    $heating = [
        'Gaz',
        'Au sol',
        'Fioul',
        'Central / Collectif',
        'Individuel',
        'Electrique'
    ];

    $heating = array_chunk($heating, 5);

@endphp

@extends('layouts.admin')

@section('sub-content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1 class="h2">{{ $title }}</h1>

                @if (isset($property))
                    <form method="POST" action="{{ action('Admin\PropertiesController@destroy', $property->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            </div>
            <div class="card-body">
                <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                    @csrf
                    @if (Str::contains(Route::currentRouteAction(), 'edit'))
                        @method('put')
                    @endif
                    <h2 class="h3">Information</h2>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Title</span>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="title" value="{{ $property->title ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">City</span>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="city" value="{{ $property->city ?? '' }}" placeholder="Example (Paris)">
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Department</span>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="department" value="{{ $property->department ?? '' }}" placeholder="Example 75001">
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Prix</span>
                        <div class="col-sm">
                            <input type="number" class="form-control" name="price" value="{{ $property->price ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Surface <small>(m²)</small></span>
                        <div class="col-sm">
                            <input type="number" class="form-control" name="surface" value="{{ $property->surface ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Nombre de pièces</span>
                        <div class="col-sm">
                            <input type="number" class="form-control" name="rooms" value="{{ $property->rooms ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Description</span>
                        <div class="col-sm mb-3">
                            <textarea name="description" cols="30" rows="10" class="form-control">{{ $property->description ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Type de bien</span>
                        <div class="col-sm">
                            <div class="row">
                            @foreach($types as $row)
                                <div class="col-sm">
                                    @foreach($row as $item)
                                        <div class="my-1">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{ Str::slug($item) }}" name="types[{{ $item }}]" {{ isset($property->types[$item]) ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="{{ Str::slug($item) }}">{{ $item }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Commodités</span>
                        <div class="col-sm">
                            <div class="row">
                                @foreach($amenities as $row)
                                    <div class="col-sm">
                                        @foreach($row as $item)
                                            <div class="my-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="{{ Str::slug($item) }}" name="amenities[{{ $item }}]" {{ isset($property->amenities[$item]) ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="{{ Str::slug($item) }}">{{ $item }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Sécurité</span>
                        <div class="col-sm">
                            <div class="row">
                                @foreach($securities as $row)
                                    <div class="col-sm">
                                        @foreach($row as $item)
                                            <div class="my-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="{{ Str::slug($item) }}" name="securities[{{ $item }}]" {{ isset($property->securities[$item]) ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="{{ Str::slug($item) }}">{{ $item }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h2 class="h4">Photos</h2>
                    <div class="form-group">
                        <div class="row">
                            @for($i=0; $i < 9; $i++)
                                <div class="col-sm-4 d-flex flex-wrap">
                                    <div class="card mb-3">
                                        <div class="card-body img-upload" id="image-{{ $i }}">
                                            @if (isset($property->images[$i]))
                                                <div class="img-preview">
                                                   <img src="/images/{{ $property->images[$i] }}" alt="" class="img-fluid">

                                                    <div class="remove" title="Delete">X</div>
                                                </div>
                                            @else
                                                <input type="file" name="images[]" accept="image/*" id="input-image-{{ $i }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <button class="btn btn-primary btn-lg btn-block">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="/js/create_or_edit.js"></script>
@endpush
