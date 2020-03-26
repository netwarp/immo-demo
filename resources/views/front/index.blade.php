@extends('layouts.app')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <section id="section-main-search">
        <form action="" method="GET">
            <select name="type">
                <option value="acheter">Acheter</option>
                <option value="louer">Louer</option>
            </select>
            <input type="text" class="" name="location" placeholder="Où">
            <input type="text" name="min" placeholder="Min m²">
            <input type="text" name="" placeholder="Min €">
            <input type="text" name="" placeholder="Max €">
            <button type="submit">Rechercher</button>
        </form>
    </section>

    <section class="section">
        <div class="container">
            <h2>Nos dernières offres</h2>
            <div class="row">
                @for($i = 0; $i < 6; $i++)
                @foreach($properties as $property)
                    <div class="col-md-4">
                        <div class="card offer-preview">
                            <div class="">
                                <a href="{{ action('Front\FrontController@getProperty', $property->slug) }}" class="">
                                    <img src="{{ $property->preview() ?? '' }}" alt="" class="card-img-top">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <small>5 photos</small>
                                    <small>Mise à jour: {{ $property->updated_at->format('d/m/Y') }}</small>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="h5">
                                        {{ $property->city ?? '' }}
                                        {{ $property->department ?? '' }}
                                    </div>
                                    <b>{{ $property->priceFormat() . ' €' ?? '' }}</b>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <span><b>{{ $property->surface ?? '' }}</b> m²</span>
                                    <span><b>{{ $property->rooms ?? '' }}</b> pièce{{ $property->rooms > 1 ? 's' : '' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endfor
            </div>
            <div class="text-center">
                <a href="#" class="btn btn-primary btn-lg">Voir toutes nos offres</a>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container">
            <h2>Contact</h2>
            <p>
                Vous cherchez un conseils, vous avez un projet, vous pouvez contacter un professionnel
            </p>
            <a href="#" class="btn btn-primary">Contact</a>
        </div>
    </section>
    {{--
    <section class="section-top-search">
        <div class="container">
            <form action="/" method="GET">

                <input-hash-tags></input-hash-tags>

                <div class="form-group">
                    <select class="js-example-basic-single" name="type" data-minimum-results-for-search="Infinity">
                        <option value="">Type de bien</option>
                        <option value="AL">Alabama</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>

                <div class="form-group">
                    <select-checkboxes></select-checkboxes>
                </div>
            </form>
        </div>
    </section>
    <div class="container">
        <div class="row">
            @foreach($properties as $property)
                <div class="col-md-4">
                    <div class="card">
                        <div class="">
                            <a href="{{ action('Front\FrontController@getProperty', $property->slug) }}" class="">
                                <img src="{{ $property->preview() ?? '' }}" alt="" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-body">
                            <h2>
                                <a href="{{ action('Front\FrontController@getProperty', $property->slug) }}">
                                    {{ $property->title ?? '' }}
                                </a>
                            </h2>
                            <div>
                                <div class="h5">
                                    {{ $property->priceFormat() . ' €' ?? '' }}
                                </div>
                            </div>
                            <div>
                                {{ $property->city ?? '' }}
                                {{ $property->department ?? '' }}
                            </div>
                            <div>
                                {{ $property->surface . ' m²' ?? '' }}
                            </div>
                            <div>
                                {{ $property->rooms . ' pièces' ?? '' }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    --}}
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({

            });
        });
    </script>
@endpush
