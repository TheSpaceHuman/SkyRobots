@extends('layouts.first')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Регистрация</div>

                <div class="card-body">

                    <register-form action="{{ route('register') }}" check-email-action="{{ route('api.validation.checkEmail') }}" method="post"></register-form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
