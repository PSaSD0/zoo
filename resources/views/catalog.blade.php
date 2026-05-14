@extends('layouts.app')

@section('content')
    <h1>Каталог</h1>

    <form action="{{ route('catalog') }}" method="get">
        @csrf
        <div class="d-flex justify-content-start">
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
                            <a href="{{ route('card', $a->id) }}" class="btn btn-primary">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
