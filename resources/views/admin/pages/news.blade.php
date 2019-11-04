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
                                            <h5>News</h5>
                                            <span>Новости</span>
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
                                                        <h5>Список новостей</h5>
                                                        <div class="mt-5">
                                                            <a href="{{ route('news.create') }}" class="btn btn-primary">Добавить</a>
                                                        </div>
                                                        @include('partials.notifications.message')
                                                    </div>
                                                    <div class="card-block table-border-style">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Название</th>
                                                                    <th>Описание</th>
                                                                    <th>Картинка</th>
                                                                    <th>Действия</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse($news as $post)
                                                                        <tr>
                                                                            <th scope="row">{{ $post->id }}</th>
                                                                            <td>{{ Str::limit($post->title, 55) }}</td>
                                                                            <td>{{ Str::limit($post->intro, 45)  }}</td>
                                                                            <td>
                                                                                <img style="width: 80px;height: auto;" src="{{ $post->getImage() }}" alt="{{ $post->title }}">
                                                                            </td>
                                                                            <td class="table__actions">
                                                                                <a href="{{ route('news.show', ['news' => $post]) }}" class="text-secondary" title="Посмотреть подробно"><i class="icon-eye"></i></a>
                                                                                <a href="{{ route('news.edit', ['news' => $post]) }}" title="Изменить" class="text-warning"><i class="icon-note"></i></a>
                                                                                <form action="{{ route('news.destroy', ['news' => $post]) }}" class="table__actions__destroy" method="post"> @csrf @method('delete')
                                                                                    <button type="submit" class="text-danger btn-clear" title="Удалить"><i class="icon-close"></i></button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @empty
                                                                        <h4 class="h4 text-center text-danger">Новости отсутствуют</h4>
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