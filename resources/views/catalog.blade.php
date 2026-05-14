@extends('layouts.app')

@section('content')
    <h1>Каталог</h1>

    <form class="d-flex mt-4" action="{{ route('search') }}" method="get" style="max-width: 70%">
        <input class="form-control me-2" type="search" name="search" placeholder="Поиск...">
        <button class="btn btn-outline-success" type="submit">Найти</button>
    </form>

    <form action="{{ route('catalog') }}" method="get" style="max-width: 70%">
        @csrf
        <div class="d-flex justify-content-start mt-">
            <select class="form-select m-5 ms-0" style="width: 250px;" name="sort">
                <option value="">Упорядочить</option>
                <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>По названию</option>
                <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>По цене</option>
            </select>

            <select class="form-select m-5 ms-0" style="width: 250px;" name="category">
                <option value="">Категории</option>
                @foreach ($categories as $a)
                    <option value="{{ $a->id}}" {{ request('category') == $a->id ? 'selected' : '' }}>{{ $a->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success m-5">Отфильтровать</button>
        </div>
    </form>

    <div class="container">
        <div class="row">
            @foreach ($array as $a)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($a->image) }}" class="card-img-top" alt="{{ $a->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $a->title }}</h5>
                            <p class="card-text">{{ $a->price }} ₽</p>
                            <a href="{{ route('card', $a->id) }}" class="btn btn-primary mb-2">Перейти</a>
                            @auth
                                @if(Auth::user()->id_role == 2)
                                    <br><a href="{{ route('editProductView',['id'=>$a->id]) }}" class="btn btn-outline-primary btn-sm mb-2">Редактировать товар</a>

                                    <form action="{{ route('dellProduct') }}" method="post">
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
            <p>{{ session('messageDellProduct') }}</p>
        </div>
    </div>
@endsection
