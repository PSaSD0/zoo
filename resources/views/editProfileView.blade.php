@extends('layouts.app')

@section('content')
    @if(Auth::user())
    <h2 class="m-5 mb-0">Редактировать профиль</h2>
    <form action="{{ route('editProfile', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card p-2 m-5">
            <div class="card-body">
                <label class="form-label mt-3" for="name">Имя</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}">

                <label class="form-label mt-3" for="email">email</label>
                <input class="form-control" type="text" id="email" name="email" value="{{ $user->email }}">

                <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                <a href="{{ route('profile', ['id' => Auth::id()]) }}" class="btn btn-link mt-3">вернуться</a>
                <p>{{ session('messageEditProfile') }}</p>
            </div>
        </div>
    </form>
    @endif
@endsection
