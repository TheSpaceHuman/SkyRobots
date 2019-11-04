@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('action.userUpdate', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">@method('PUT')@csrf
                    <div class="card mb-5">
                        <h1 class="card-header">Профиль</h1>
                        <div class="card-body">
                            @include('partials.notifications.message')

                            @if(Auth::user()->howMuchToEndTariff())
                                <div class="alert alert-success my-4" role="alert">
                                    Тариф: {{ Auth::user()->package->title }} <br>
                                    Активный до: {{ date('d-m-Y h:m', strtotime(Auth::user()->activated_to)) }}
                                </div>
                            @else
                                <div class="alert alert-danger my-4" role="alert">
                                    Ваш тариф неактивен
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name">Логин</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Почта</label>
                                <input type="text" id="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="text" id="phone" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="region">Регион</label>
                                <input type="text" id="region" class="form-control" name="region" value="{{ Auth::user()->region }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" id="password" class="form-control" name="password" value="">
                            </div>
                            <div class="form-group">
                                <label for="password-new">Новый пароль</label>
                                <input type="password" id="password-new" class="form-control" name="password-new" value="">
                            </div>
                                <referral-link code="{{ Auth::user()->registration_referral_link }}"></referral-link>
                            {{--<div class="form-group">
                                <label for="registration_referral_link">Реферальная ссылка регистрации</label>
                                <input type="text" id="registration_referral_link" class="form-control" name="registration_referral_link" value="{{ Auth::user()->registration_referral_link }}" disabled>
                            </div>--}}
                            <div class="form-group">
                                <label for="brokerage_referral_link">Брокерская реферальная ссылка</label>
                                <input type="text" id="brokerage_referral_link" class="form-control" name="brokerage_referral_link" value="{{ Auth::user()->brokerage_referral_link }}">
                            </div>
                            <div class="form-group">
                                <label for="provider_referral_link">Реферальная ссылка провайдера</label>
                                <input type="text" id="provider_referral_link" class="form-control" name="provider_referral_link" value="{{ Auth::user()->provider_referral_link }}">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Аватар</label>
                                <input type="file" id="avatar" class="form-control" name="avatar">
                            </div>
                            <div class="d-flex align-items-center justify-content-end my-4">
                                <button type="submit" class="btn btn-warning">Обновить</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection