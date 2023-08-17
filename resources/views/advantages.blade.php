<div class="advantages p1">
    <div class="container">
        <h5 class="title-header">Почему клиенты выбирают нас</h5>

        <div class="row">
            @foreach($advantages as  $advantage)
                <div class="col-12 col-lg-3">
                    <div class="advantages-item">
                        <img src="{{ $advantage->icon }}" alt="{{ $advantage->title }}">
                        <p>
                            {{ $advantage->title }}

                            @if($advantage->text) <small class="d-block">{{ $advantage->text }}</small> @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>