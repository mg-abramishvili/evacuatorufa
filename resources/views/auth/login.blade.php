@extends('layouts.admin')
@section('content')

<section>
    <div class="container pt-4">
        <div class="row justify-content-sm-center">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="mb-2 text-muted">Логин</label>
                                <input id="email" class="form-control" type="email" name="email" required />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="mb-2 text-muted">Пароль</label>
                                <input id="password" class="form-control" type="password" name="password" required />
                            </div>

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary">
                                    Войти
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection