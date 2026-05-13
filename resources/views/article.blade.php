@extends('layouts.app')

@section('content')
    <h1 class="mb-3">{{ $article->title }}</h1>
    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="img-fluid rounded-4 shadow mb-3 p-0 w-50" style="margin-left: 15px;">
    <p>{{ $article->description }}</p>
@endsection
