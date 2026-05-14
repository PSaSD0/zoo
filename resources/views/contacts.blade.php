@extends('layouts.app')

@section('content')
    @foreach ($contacts as $contact)
        <div class="d-flex card p-2 m-1">
            <h4 class="ms-2">Наши контакты</h4>
            <div class="col">
                <div class="card p-2 m-1">
                    <h5>Номер телефона</h5>
                    <p>{{ $contact->number }}</p>
                    @auth
                        @if(Auth::user()->id_role == 2)
                            <form action="{{ route('editNumber') }}" method="post">
                                @csrf
                                <label class="form-label" for="number">Редактировать номер телефона</label>
                                <input class="form-control" type="text" id="number" name="number">
                                <button type="submit" class="btn btn-primary mt-2">Сохранить</button>
                                <p>{{ session('messageEditNumber') }}</p>
                            </form>
                        @endif
                    @endauth
                </div>
                <div class="card p-2 m-1">
                    <h5>Электронная почта</h5>
                    <p>{{ $contact->email }}</p>
                    @auth
                        @if(Auth::user()->id_role == 2)
                            <form action="{{ route('editEmail') }}" method="post">
                                @csrf
                                <label class="form-label" for="email">Редактировать электронную почту</label>
                                <input class="form-control" type="text" id="email" name="email">
                                <button type="submit" class="btn btn-primary mt-2">Сохранить</button>
                                <p>{{ session('messageEditEmail') }}</p>
                            </form>
                        @endif
                    @endauth
                </div>
                <div class="card p-2 m-1">
                    <h5>Адрес</h5>
                    <p>{{ $contact->adress }}</p>
                    @auth
                        @if(Auth::user()->id_role == 2)
                            <form action="{{ route('editAdress') }}" method="post">
                                @csrf
                                <label class="form-label" for="adress">Редактировать адрес</label>
                                <input class="form-control" type="text" id="adress" name="adress">
                                <button type="submit" class="btn btn-primary mt-2">Сохранить</button>
                                <p>{{ session('messageEditAdress') }}</p>
                            </form>
                        @endif
                    @endauth
                </div>
                <div class="card p-0 m-1 w-50">
                    <img src="{{ $contact->image }}" alt="{{ $contact->adress }}">
                    @auth
                        @if(Auth::user()->id_role == 2)
                            <form action="{{ route('editMap') }}" method="post" enctype="multipart/form-data" class="ms-2">
                                @csrf
                                <label class="form-label mt-3" for="image">Изменить фото</label>
                                <input class="form-control" type="file" id="image" name="image" accept="image/*">
                                <button type="submit" class="btn btn-primary mt-2">Сохранить</button>
                                <p>{{ session('messageEditMap') }}</p>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
@endsection
