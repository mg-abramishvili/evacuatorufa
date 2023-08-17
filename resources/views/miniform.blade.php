<div class="mini-form p2">
    <div class="container">
        <div class="mini-form-inner">
            <h5 class="title-header">Сломалась машина и нужен эвакуатор?</h5>
            <p>Закажи эвакуатор прямо сейчас и получи скидку 10%</p>
            <a href="tel:+7{{$settings->tel2}}">+7 @php echo substr($settings->tel2, 0, 3) . ' ' . substr($settings->tel2, 3, 3) . '-' . substr($settings->tel2, 6, 2)  . '-' . substr($settings->tel2, 8, 2) @endphp</a>

            <div class="mini-form-form">
                <input type="text" class="form-control" placeholder="Введите телефон для связи">
                <button class="btn btn-primary">Получить скидку 10%</button>
            </div>
        </div>
    </div>
</div>