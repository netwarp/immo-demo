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
                                <input type="text" class="form-control" name="city" placeholder="Lieux" value="{{ Request::get('city') ?? '' }}">
                            </div>
                            <div class="form-group">
                                <select name="service" class="form-control">
                                    <option value="acheter" {{ Request::get('service') == 'acheter' ? 'selected' : '' }}>Acheter</option>
                                    <option value="louer" {{ Request::get('service') == 'louer' ? 'selected' : '' }}>Louer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="rooms" placeholder="Nombre de pièces minimum" value="{{ Request::get('rooms') ?? '' }}">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="min_surface" placeholder="Minimum mètres carrés" value="{{ Request::get('min_surface') }}">
                            </div>
                            <div class="form-group">
                                <label for="type"><b>Type de biens</b></label>
                                @foreach($types as $item)
                                    <div class="form-check">
                                        @php
                                            $checked = false;
                                            $array = Request::get('types');
                                            if ($array) {
                                                if (in_array($item, $array)) {
                                                    $checked = true;
                                                }
                                            }
                                        @endphp
                                        <input type="checkbox" class="form-check-input" id="{{ $item }}" name="types[]" value="{{ $item }}" {{ $checked ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $item }}">{{ $item }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="amenities"><b>Commodités</b></label>
                                @foreach($amenities as $item)
                                    <div class="form-check">
                                        @php
                                            $checked = false;
                                            $array = Request::get('amenities');
                                            if ($array) {
                                                if (in_array($item, $array)) {
                                                    $checked = true;
                                                }
                                            }
                                        @endphp
                                        <input type="checkbox" class="form-check-input" id="{{ $item }}" name="amenities[]" value="{{ $item }}" {{ $checked ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $item }}">{{ $item }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="securities"><b>Sécurités</b></label>
                                @foreach($securities as $item)
                                    <div class="form-check">
                                        @php
                                            $checked = false;
                                            $array = Request::get('securities');
                                            if ($array) {
                                                if (in_array($item, $array)) {
                                                    $checked = true;
                                                }
                                            }
                                        @endphp
                                        <input type="checkbox" class="form-check-input" id="{{ $item }}" name="securities[]" value="{{ $item }}" {{ $checked ? 'checked' : '' }}>
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
                @forelse($properties as $property)
                    <div class="card mb-2">
                        <div class="row">
                            <div class="col-md">
                                <a href="{{ action('Front\FrontController@getProperty', $property->slug) }}">
                                    <img src="{{ $property->preview() ?? '' }}" alt="" class="card-img-top" title="{{ $property->title ?? '' }}">
                                </a>
                            </div>
                            <div class="col-md">
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
                                    {{ $property->service ?? '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    Pas d'offres selon vos critères
                @endforelse
                {{ $properties->links() }}
            </div>
        </div>
    </div>
@endsection
