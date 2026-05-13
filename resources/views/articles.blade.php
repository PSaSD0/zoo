@extends('layouts.app')

@section('content')
    <h1>Полезные статьи</h1>

    <div class="container">
        <div class="row">
            @foreach ($array as $a)
            <div class="col">
                <div class="card h-100">
                    <div class="text-center p-0" style="height: 220px;">
                        <img src="{{ asset($a->image) }}" alt="{{ $a->title }}" class="card-img-top" style="height: 100%">
                    </div>
                    <div class="card-body ">
                        <h5 class="card-title text-dark">{{ $a->title }}</h5>
                        <p class="card-text text-dark">{{ $a->created_at }}</p>
                        <a href="{{ route('article', $a->id) }}" class="btn btn-outline-primary btn-sm mt-4">Читать</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
