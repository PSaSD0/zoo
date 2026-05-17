@extends('layouts.app')

@section('content')
@if(Auth::user())
<div class="d-flex card p-2 m-1 bg-success-subtle">
    <h4 class="ms-2">Личный кабинет</h4>
    <div class="col">
        <div class="card p-2 m-1">
            <h5>Имя</h5>
            <p>{{ $user->name }}</p>
        </div>
        <div class="card p-2 m-1">
            <h5>Электронная почта</h5>
            <p>{{ $user->email }}</p>
        </div>
        <div class="card p-2 m-1">
            <h5>Создан</h5>
            <p>{{ $user->created_at }}</p>
        </div>
        <div class="p-2">
            <a href="{{ route('editProfileView',['id'=>$user->id]) }}" class="btn btn-success text-decoration-none">Редактировать профиль</a>
        </div>
    </div>
</div>
@endif
@endsection
