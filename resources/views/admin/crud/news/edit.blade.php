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
                                            <h5>Изменение новости</h5>
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
                                                <form action="{{ route('news.update', ['news' => $news]) }}" method="post" enctype="multipart/form-data">@csrf @method('put')
                                                    <div class="form-group">
                                                        <label for="title">Название</label>
                                                        <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="intro">Описание</label>
                                                        <input type="text" class="form-control" id="intro" name="intro" value="{{ $news->intro }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Картинка</label>
                                                        <div class="my-4">
                                                            <img style="width: 120px;height: auto;" src="{{ $news->getImage() }}" alt="{{ $news->title }}">
                                                        </div>
                                                        <input type="file" class="form-control"  id="image" name="image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="body">Контент</label>
                                                        <textarea type="text" class="form-control summernote-editor"  id="body" name="body" rows="8">{!! $news->body !!}</textarea>
                                                    </div>
                                                    <div class="d-flex my-3">
                                                        <button class="btn btn-primary" type="submit">Обновить</button>
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