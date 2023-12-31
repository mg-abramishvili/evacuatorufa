<a class="anchor" id="services"></a>
<div class="services p1">
    <div class="container">
        <h2 class="title-header">Эвакуатор по Уфе, РБ и РФ</h2>

        <div class="row">
            @foreach($pages as $page)
                <div class="col-12 col-lg-4">
                    <div class="services-item">
                        <img src="{{ $page->icon }}" alt="{{ $page->name }}">
                        <h3 class="services-item-name">
                            <a href="/p/{{ $page->slug }}">{{ $page->name }}</a>
                        </h3>

                        <span>от {{ $page->price }} руб.</span>

                        <div class="services-item-actions">
                            <a href="tel:+7{{$settings->tel2}}">Вызвать</a>
                            <a href="/p/{{ $page->slug }}">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>