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
            <div class="card-header">
                <h1 class="h2">Create new property</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ action('Admin\PropertiesController@store') }}">
                    @csrf
                    <h2 class="h3">Information</h2>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Title</span>
                        <div class="col-sm">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Prix</span>
                        <div class="col-sm">
                            <input type="number" class="form-control" name="price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Surface</span>
                        <div class="col-sm">
                            <input type="number" class="form-control" name="surface">
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Nombre de pièces</span>
                        <div class="col-sm">
                            <input type="number" class="form-control" name="rooms">
                        </div>
                    </div>

                    <div class="form-group row">
                        <span class="col-sm-1 col-form-label">Description</span>
                        <div class="col-sm mb-3">
                            <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
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
                                                <input type="checkbox" class="custom-control-input" id="{{ Str::slug($item) }}" name="types[{{ $item }}]">
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
                                                    <input type="checkbox" class="custom-control-input" id="{{ Str::slug($item) }}" name="amenities[{{ $item }}]">
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
                                                    <input type="checkbox" class="custom-control-input" id="{{ Str::slug($item) }}" name="securities[{{ $item }}]">
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
                    <div class="row">
                        @for($i = 0; $i < 10; $i++)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Image {{ $i + 1 }} {{ $i == 0 ? '(Image principale)' : '' }}
                                    </div>
                                    <div class="card-body">
                                        <div class="file-container">
                                            <input type="file" accept=".png, .jpg, .jpeg" class="file-input" id="file-input-{{ $i }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
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
