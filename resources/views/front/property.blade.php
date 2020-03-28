@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
@endpush

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body card-property">
                        <div class="">
                            <div>
                                <a data-fancybox="gallery" href="{{ $property->preview() }}" class="img-link">
                                    <img  src="{{ $property->preview() ?? '' }}" alt="" class="img-fluid img-large">
                                </a>
                            </div>
                            @if ($property->images)
                                @foreach($property->images as $image)
                                    <img src="/images/{{ $image }}" alt="" class="img-small" style="width: 120px;">
                                @endforeach
                            @endif
                            <div>
                                {{ $property->imagesCount() }} image{{ $property->imagesCount() > 1 ? 's' : ''  }}
                            </div>
                        </div>
                        <div class="">
                            <h1>{{ $property->title ?? '' }}</h1>
                            <div>
                                Prix: <b>{{ $property->priceFormat() . ' €' ?? '' }}</b>
                            </div>

                            <div>
                                Surface: <b>{{ $property->surface . ' m²' ?? '' }}</b>
                            </div>
                            <div>
                                Description: {{ $property->description }}
                            </div>
                            <div>
                                <div class="h4">
                                    Types
                                </div>
                                @forelse($property->types as $key => $item)
                                    <div>
                                        {{ $key }}
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <div>
                                <div class="h4">
                                    Commodités
                                </div>
                                @forelse($property->amenties as $key => $item)
                                    <div>
                                        {{ $key }}
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <div>
                                <div class="h4">
                                    Sécurités
                                </div>
                                @forelse($property->securities as $key => $item)
                                    <div>
                                        {{ $key }}
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <div class="my-3">
                            Contact
                        </div>
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Nom Prénom">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="Téléphone">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="/js/property.js"></script>
@endpush
