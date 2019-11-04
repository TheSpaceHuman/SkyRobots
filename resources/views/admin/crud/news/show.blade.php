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
                                            <h5>Детальный просмотр {{ $news->title }}</h5>
                                            <div class="mt-4">
                                                <a href="{{ route('admin.page.news') }}" class="btn btn-outline-secondary">Назад</a>
                                            </div>
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
                                                    <div class="card-image mb-4">
                                                        <img src="{{ $news->getImage() }}" alt="{{ $news->title }}">
                                                    </div>
                                                    <div class="card-header">
                                                        <h1 class="card-title h1 text-center">{{ $news->title }}</h1>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="mb-4"><p class="text-primary"><b>{{  $news->intro }}</b></p></div>
                                                        <div class="mb-4">{!! $news->body !!}</div>
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