@extends('layouts.app')

@section('content')

    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h2 class="display-5 fw-bold mb-3">Кто такие Zoo?</h2>
            <p>Мы — небольшой магазин лакомств для собак и кошек. Нас несколько человек, и у каждого дома живёт кто-то с хвостом. Поэтому мы подходим к выбору товаров так, как будто покупаем для себя.</p>

            <div class="mt-4">
                <h4>Что у нас в ассортименте?</h4>
                <p>Сушёное мясо и рыба, жевательные палочки, субпродукты (лёгкие, рубец, трахея, сердечки), печенье без зерна, рыбий жир и иногда игрушки.</p>
                <p>Главное правило — никакой химии. В составе не должно быть сахара, соли, усилителей вкуса, искусственных ароматизаторов и консервантов. Если написано «куриное филе» — значит, внутри действительно курица, а не смесь белков с мукой.</p>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('assets/img/image.png') }}"
                alt="Милый котик"
                class="img-fluid rounded-4 shadow"
                width="400">
        </div>
    </div>

    <div class="row align-items-center my-5 py-3">
        <div class="col-md-6 order-md-2 mb-4 mb-md-0">
            <h4>Как мы проверяем товары?</h4>
            <p>Сначала смотрим документы от поставщика — сертификаты, декларации, происхождение сырья. Если документов нет, даже не обсуждаем.</p>
            <p>Потом заказываем образец на пробу. Открываем, смотрим, нюхаем. Потом даём своим животным. Если съедают без проблем и никаких аллергий в следующие пару дней — товар попадает на склад. Если хотя бы один из четвероногих отворачивается или после лакомства начинается зуд — партия не закупается. Даже если поставщик уговаривает и предлагает скидку.</p>
        </div>
            <div class="col-lg-6">
                <img src="{{ asset('assets\img\2025-01-24-09-01-57a2812d5f01d0afedecb.png') }}"
                    alt="Милый котик"
                    class="img-fluid rounded-4 shadow"
                    width="100%">
            </div>
    </div>

    <div class="row my-5 py-3">
        <div class="col-md-6 mb-4 mb-md-0">
            <h4>Где мы находимся?</h4>
            <p>Склад и офис в Москве. Забрать заказ самовывозом можно по предварительной договорённости — пишите в чат или в мессенджеры, договоримся на удобное время.</p>
        </div>
        <div class="col-md-6 text-center">
                <div style="position:relative;overflow:hidden;">
                    <a href="https://yandex.ru/maps/org/plov_burger/62990377548/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Плов & Бургер</a>
                    <a href="https://yandex.ru/maps/213/moscow/category/cafe/184106390/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Кафе в Москве</a>
                    <iframe src="https://yandex.ru/map-widget/v1/?ll=37.658430%2C55.699924&mode=poi&poi%5Bpoint%5D=37.657537%2C55.700127&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D62990377548&z=16.6" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;" class="rounded-4"></iframe>
                </div>
    </div>

    <div class="row align-items-center my-5 py-3">
        <div class="col-md-6 order-md-2 mb-4 mb-md-0">
            <h4>Как давно работаем?</h4>
            <p>С 2022 года. За это время через нас прошло несколько тысяч заказов. Бывали ошибки с отгрузкой, бывали задержки, но ни разу не было ситуации, когда мы не решили проблему. Возвращаем деньги, если товар не подошёл (конечно, если он не съеден наполовину). Меняем брак, если он есть. В общем, относимся к этому как к нормальной работе, а не как к одолжению.</p>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('assets\img\korgi_1023x448.webp') }}"
                alt="Милый котик"
                class="img-fluid rounded-4 shadow"
                width="100%">
        </div>
    </div>
    <div class="row align-items-stretch p-3">
    <div class="col-md-6 mb-4">
        <div class="card h-100 ps-1 pt-2 m-1">
            <h4 class="ms-2">Отзывы</h4>
            <div class="overflow-auto" style="max-height: 400px;">
                @foreach ($reviews as $review)
                    <div class="card ps-2 pt-2 m-2 review-item mb-3">
                        <p class="mb-1">
                            <strong>{{ $review->user_name }}</strong><br>
                            {{ $review->rating }}<span class="text-warning">★</span><br>
                            {{ $review->comment }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
    <div class="card h-100 ps-2 pt-2 m-1">
        <h4 class="ms-2">Оставить отзыв</h4>
        <div class="d-flex flex-column h-100">
            <form method="POST" action="{{ route('reviews.store') }}" class="h-100">
                @csrf
                <div class="d-flex flex-column h-100 ps-2 pt-2 m-1">
                    <div class="mb-3">
                        <label for="comment" class="form-label fw-semibold">Напишите отзыв</label>
                        <textarea class="form-control"
                                  id="comment"
                                  name="comment"
                                  rows="4"
                                  placeholder="Расскажите о вашем опыте..."
                                  required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label fw-semibold">Оценка</label>
                        <select class="form-select" id="rating" name="rating" required>
                            <option value="">Выберите оценку</option>
                            <option value="1">1 ★</option>
                            <option value="2">2 ★★</option>
                            <option value="3">3 ★★★</option>
                            <option value="4">4 ★★★★</option>
                            <option value="5">5 ★★★★★</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-center mt-2 pt-3">
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            Оставить отзыв
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
