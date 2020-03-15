@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div>
                                    <img src="{{ $property->preview() ?? '' }}" alt="" class="img-fluid">
                                </div>
                                @foreach($property->images as $image)
                                    <img src="/images/{{ $image }}" alt="" class="" style="width: 120px;">
                                @endforeach
                            </div>
                            <div class="col-md">
                                <h1>{{ $property->title ?? '' }}</h1>
                                <div>
                                    {{ $property->priceFormat() . ' €' ?? '' }}
                                </div>
                                <div>
                                    {{ $property->imagesCount() }} image{{ $property->imagesCount() > 1 ? 's' : ''  }}
                                </div>
                                <div>
                                    {{ $property->surface . ' m²' ?? '' }}
                                </div>
                                <div>
                                    {{ $property->description }}
                                </div>
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
