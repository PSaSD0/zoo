@extends('layouts.app')

@section('content')
    <h2 class="m-5 mb-0">Редактировать товар</h2>
    <form action="{{ route('editProduct', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card p-2 m-5">
            <img src="{{ asset($product->image) }}" class="img-fluid" style="max-height: 100%; width: 25%; max-width: 100%; object-fit: contain;">
            <div class="card-body">
                <label class="form-label mt-3" for="image">Изменить фото</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">

                <label class="form-label mt-3" for="nameProduct">Название товара</label>
                <input class="form-control" type="text" id="nameProduct" name="nameProduct" value="{{ $product->title }}">

                <label class="form-label mt-3" for="id_category">Выбор категории</label>
                <select class="form-select" name="id_category">
                    @foreach ($categories as $a)
                        <option value="{{ $a->id }}"
                            {{ $product->id == $a->id? 'selected' : '' }}>
                            {{ $a->title }}
                        </option>
                    @endforeach
                </select>

                <label class="form-label mt-3" for="descriptionProduct">Описание товара</label>
                <textarea class="form-control" rows="5" type="text" id="descriptionProduct" name="descriptionProduct">{{ $product->description }}</textarea>

                <label class="form-label mt-3" for="costProduct">Цена товара</label>
                <input class="form-control" type="text" id="costProduct" name="costProduct" value="{{ $product->price }}">

                <button type="submit" class="btn btn-success mt-3">Сохранить</button>
                <p>{{ session('messageEditProduct') }}</p>
            </div>
        </div>
    </form>
@endsection
