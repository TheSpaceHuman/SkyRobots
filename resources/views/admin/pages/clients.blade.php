@extends('admin.layouts.main')

@section('content')

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('admin.includes.header')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">


                    @include('admin.includes.aside')

                    <div class="pcoded-content">

                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-12">
                                    <div class="page-header-title">
                                        <div class="d-inline">
                                            <h5>Clients</h5>
                                            <span>Клиенты</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Список клиентов</h5>
                                                    </div>
                                                    <div class="card-block table-border-style">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Имя</th>
                                                                    <th>Email</th>
                                                                    <th>Телефон</th>
                                                                    <th>Лицензия</th>
                                                                    <th>Активнойсть</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse($users as $user)
                                                                        <tr>
                                                                            <th scope="row">{{ $user->id }}</th>
                                                                            <td>{{ $user->name }}</td>
                                                                            <td>{{ $user->email }}</td>
                                                                            <td>{{ $user->phone }}</td>
                                                                            <td>{{ $user->package ? $user->package->title : 'Отсутствует'  }}</td>
                                                                            <td>@if($user->howMuchToEndTariff()) <span class="text-success">{{ $user->howMuchToEndTariff() }} окончания подписки</span> @else <span class="text-danger">Нет</span> @endif</td>
                                                                        </tr>
                                                                    @empty
                                                                        <h4 class="h4 text-center text-danger">Пользователи отсутствуют</h4>
                                                                    @endforelse
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="styleSelector"></div>

                </div>
            </div>
        </div>
    </div>

@endsection