@extends('layouts.app')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
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
        @foreach($properties as $property)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ action('Front\FrontController@getProperty', $property->slug) }}" class="">
                                <img src="{{ $property->preview() ?? '' }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md">
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
                            <div class="my-3">
                                <a href="{{ action('Front\FrontController@getProperty', $property->slug) }}" class="btn btn-primary">Voir +</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
