@extends('layouts.app')

@section('content')
    <h1>Полезные статьи</h1>

    <div class="container">
        <div class="row">
            @foreach ($array as $a)
            <div class="col-md-3 col-sm-5 mb-4">
                <div class="card h-100">
                    <div class="text-center p-0" style="height: 220px;">
                        <img src="{{ asset($a->image) }}" alt="{{ $a->title }}" class="card-img-top" style="height: 100%">
                    </div>
                    <div class="card-body ">
                        <h5 class="card-title text-dark">{{ $a->title }}</h5>
                        <p class="card-text text-dark">{{ $a->created_at }}</p>
                        <a href="{{ route('article', $a->id) }}" class="btn btn-outline-primary btn-sm mt-4 mb-2">Читать</a>
                        @auth
                            @if(Auth::user()->id_role == 2)
                                <br><a href="{{ route('editArticleView',['id'=>$a->id]) }}" class="btn btn-outline-primary btn-sm mb-2">Редактировать статью</a>

                                <form action="{{ route('dellArticle') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $a->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
            <p>{{ session('messageDellArticle') }}</p>
        </div>
    </div>
@endsection
