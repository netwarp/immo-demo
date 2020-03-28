@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Nos offres</h1>

        <div class="row">
            @include('front.includes.search')
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
