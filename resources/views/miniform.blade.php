<div class="mini-form p2">
    <div class="container">
        <div class="mini-form-inner">
            <h5 class="title-header">Сломалась машина и нужен эвакуатор?</h5>
            <p>Закажи эвакуатор прямо сейчас и получи скидку 10%</p>
            <a href="tel:+7{{$settings->tel2}}">+7 @php echo substr($settings->tel2, 0, 3) . ' ' . substr($settings->tel2, 3, 3) . '-' . substr($settings->tel2, 6, 2)  . '-' . substr($settings->tel2, 8, 2) @endphp</a>

            <create-mini-lead form_id="@php echo mt_rand(1, 1000) @endphp"></create-mini-lead>
        </div>
    </div>
</div>