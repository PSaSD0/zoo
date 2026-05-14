@extends('layouts.app')

@section('content')
    @foreach ($contacts as $contact)
        <div class="d-flex card p-2 m-1">
            <h4 class="ms-2">Наши контакты</h4>
            <div class="col">
                <div class="card p-2 m-1">
                    <h5>Номер телефона</h5>
                    <p>{{ $contact->number }}</p>
                </div>
                <div class="card p-2 m-1">
                    <h5>Электронная почта</h5>
                    <p>{{ $contact->email }}</p>
                </div>
                <div class="card p-2 m-1">
                    <h5>Адрес</h5>
                    <p>{{ $contact->adress }}</p>
                </div>
                <div class="card p-2 m-1">
                    <div style="position:relative;overflow:hidden;">
                        <a href="https://yandex.ru/maps/org/plov_burger/62990377548/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Плов & Бургер</a>
                        <a href="https://yandex.ru/maps/213/moscow/category/cafe/184106390/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Кафе в Москве</a>
                        <iframe src="https://yandex.ru/map-widget/v1/?ll=37.658430%2C55.699924&mode=poi&poi%5Bpoint%5D=37.657537%2C55.700127&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D62990377548&z=16.6" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;" class="rounded-4"></iframe>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
