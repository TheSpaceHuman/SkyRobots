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
                                            <h5>Создание новости</h5>
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
                                                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">@csrf
                                                    <div class="form-group">
                                                        <label for="title">Название</label>
                                                        <input type="text" class="form-control" id="title" name="title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="intro">Описание</label>
                                                        <input type="text" class="form-control" id="intro" name="intro">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Картинка</label>
                                                        <input type="file" class="form-control"  id="image" name="image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="body">Контент</label>
                                                        <textarea type="text" class="form-control summernote-editor"  id="body" name="body" rows="8"></textarea>
                                                    </div>
                                                    <div class="d-flex my-3">
                                                        <button class="btn btn-primary" type="submit">Создать</button>
                                                    </div>
                                                </form>
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