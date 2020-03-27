@extends('layouts.app')

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

    $securities = [
        'Gardien',
        'Interphone',
        'Digicode',
    ];
@endphp

@section('content')
    <div class="container my-4">
        <h1>Nos offres</h1>

        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        Recherche
                    </div>
                    <div class="card-body">
                        <form action="#" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control" name="location" placeholder="Lieux" value="{{ Request::get('location') }}">
                            </div>
                            <div class="form-group">
                                <select name="type" class="form-control">
                                    <option value="#">Acheter</option>
                                    <option value="#">Louer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="rooms" placeholder="Pièces" value="{{ Request::get('rooms') ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="min_surface" placeholder="Minimum mètres carrés" value="{{ Request::get('min_surface') }}">
                            </div>
                            <div class="form-group">
                                <label for="type"><b>Type de biens</b></label>
                                @foreach($types as $item)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="{{ $item }}">
                                        <label class="form-check-label" for="{{ $item }}">{{ $item }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="amenities"><b>Commodités</b></label>
                                @foreach($amenities as $item)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="{{ $item }}">
                                        <label class="form-check-label" for="{{ $item }}">{{ $item }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="amenities"><b>Sécurités</b></label>
                                @foreach($securities as $item)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="{{ $item }}">
                                        <label class="form-check-label" for="{{ $item }}">{{ $item }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Go</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @for($i = 0; $i < 10; $i++)
                @forelse($properties as $property)
                    <div class="card mb-2">
                        <div class="row">
                            <div class="col-md">
                                <a href="{{ action('Front\FrontController@getProperty', $property->slug) }}">
                                    <img src="{{ $property->preview() ?? '' }}" alt="" class="card-img-top">
                                </a>
                            </div>
                            <div class="col-md">
                                <h2 class="h3">
                                    {{ $property->title ?? '' }}
                                </h2>
                                <div class="h5">
                                    {{ $property->city ?? '' }}
                                    {{ $property->department ?? '' }}
                                </div>
                                <div>
                                    <b>{{ $property->priceFormat() . ' €' ?? '' }}</b>
                                </div>
                                <div>
                                    <span><b>{{ $property->surface ?? '' }}</b> m²</span>
                                    <span><b>{{ $property->rooms ?? '' }}</b> pièce{{ $property->rooms > 1 ? 's' : '' }}</span>
                                </div>
                                <div>
                                    <a href="{{ action('Front\FrontController@getProperty', $property->slug) }}" class="btn btn-primary mt-4">
                                        Voir l'offre
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    Pas d'offres selon vos critères
                @endforelse
                @endfor
            </div>
        </div>
    </div>
@endsection
