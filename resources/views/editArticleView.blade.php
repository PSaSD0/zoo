@extends('layouts.app')

@section('content')
    <h2 class="m-5 mb-0">Редактировать статью</h2>
    <form action="{{ route('editArticle', ['id' => $article->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card p-2 m-5">
            <img src="{{ asset($article->image) }}" class="img-fluid" style="max-height: 100%; width: 25%; max-width: 100%; object-fit: contain;">
            <div class="card-body">
                <label class="form-label mt-3" for="image">Изменить фото</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">

                <label class="form-label mt-3" for="nameArticle">Название товара</label>
                <input class="form-control" type="text" id="nameArticle" name="nameArticle" value="{{ $article->title }}">

                <label class="form-label mt-3" for="descriptionArticle">Описание товара</label>
                <textarea class="form-control" rows="5" type="text" id="descriptionArticle" name="descriptionArticle">{{ $article->description }}</textarea>

                <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                <p>{{ session('messageEditArticle') }}</p>
            </div>
        </div>
    </form>
@endsection
