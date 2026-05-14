@extends('layouts.app')

@section('content')
    <h1>Админ панель</h1>

    <form action="{{ route('addCategory') }}" method="post" class="mb-4">
        @csrf
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Добавление категории</h5>
                <label for="nameCategory" class="form-label">Название категории</label>
                <input type="text" class="form-control mb-4" id="nameCategory" name="nameCategory" required>
                <button type="submit" class="btn btn-primary">Добавить</button>
                <p>{{ session('messageAddCategory') }}</p>
            </div>
        </div>
    </form>

    <form action="{{ route('dellCategory') }}" method="post" class="mb-4">
        @csrf
        @method('DELETE')
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Удаление категории</h5>
                <select name="id_category" class="form-select mb-4">
                    @foreach ($categories as $a)
                        <option value="{{ $a->id }}">{{ $a->title }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-danger">Удалить</button>
                <p>{{ session('messageDellCategory') }}</p>
            </div>
        </div>
    </form>

    <form action="{{ route('addProduct') }}" method="post" class="mb-4" enctype="multipart/form-data">
        @csrf
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Добавление товара</h5>

                <label for="imageProduct" class="form-label">Фото товара</label>
                <input type="file" class="form-control mb-4" id="imageProduct" name="imageProduct" required accept="image/*">

                <label for="nameProduct" class="form-label">Название товара</label>
                <input type="text" class="form-control mb-4" id="nameProduct" name="nameProduct" required>

                <label for="descriptionProduct" class="form-label">Описание товара</label>
                <input type="text" class="form-control mb-4" id="descriptionProduct" name="descriptionProduct" required>

                <label for="id_category" class="form-label">Выбор категории</label>
                <select name="id_category" id="id_category" class="form-select mb-4">
                    @foreach ($categories as $a)
                        <option value="{{ $a->id }}">{{ $a->title }}</option>
                    @endforeach
                </select>

                <label for="priceProduct" class="form-label">Цена товара</label>
                <input type="text" class="form-control mb-4" id="priceProduct" name="priceProduct" required>

                <button type="submit" class="btn btn-primary">Добавить</button>
                <p>{{ session('messageAddProduct') }}</p>
            </div>
        </div>
    </form>

    <form action="{{ route('addArticle') }}" method="post" class="mb-4" enctype="multipart/form-data">
        @csrf
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Добавление статьи</h5>

                <label for="imageArticle" class="form-label">Фото статьи</label>
                <input type="file" class="form-control mb-4" id="imageArticle" name="imageArticle" required accept="image/*">

                <label for="nameArticle" class="form-label">Название статьи</label>
                <input type="text" class="form-control mb-4" id="nameArticle" name="nameArticle" required>

                <label for="descriptionArticle" class="form-label">Описание статьи</label>
                <textarea type="text" rows="10" class="form-control mb-4" id="descriptionArticle" name="descriptionArticle" required></textarea>

                <button type="submit" class="btn btn-primary">Добавить</button>
                <p>{{ session('messageAddArticle') }}</p>
            </div>
        </div>
    </form>
@endsection
