@extends('layouts.app')

@section('content')
    <div class="row align-items-center my-5 py-3">
        <div class="col-md-6 order-md-2 mb-4 mb-md-0">
            <h1>{{ $card->title }}</h1>
            <p>{{ $card->description }}</p>
            <p>{{ $card->price }} ₽</p>
            <a href="#" class="btn btn-primary">В корзину</a>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset($card->image) }}" alt="{{ $card->title }}" class="img-fluid rounded-4 shadow" width="100%">
        </div>
    </div>
@endsection
