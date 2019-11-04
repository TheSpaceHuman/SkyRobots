@extends('layouts.first')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h2 mb-2">Регистрация</h1>
                    <p>Куратор: <strong>{{ $parent->name }}</strong></p>
                </div>

                <div class="card-body">

                    <register-form
                            action="{{ route('register') }}"
                            check-email-action="{{ route('api.validation.checkEmail') }}"
                            method="post"
                            code="{{ $parent->registration_referral_link  }}"
                    ></register-form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
