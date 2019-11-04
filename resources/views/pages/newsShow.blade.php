@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-5">
            <div class="card-header">Последние уведомления</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h2 class="h5">Мы рады приветствовать вас {{ Auth::user()->name }} на Sky Robots</h2>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header">Новости</div>

            <div class="card-body">
                <section class="news">
                    <div class="row">
                        @forelse($news as $post)
                            <div class="col-12 col-md-6 mb-3">
                                <div class="card" style="height: 100%;">
                                    <img class="card-img-top"
                                         src="{{ $post->getImage() }}"
                                         alt="{{ $post->title }}">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $post->title }}</h4>
                                        <p class="card-text">{{ $post->intro }}</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="#" class="btn btn-primary">Подробно</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="h4 text-danger text-center">Посты отсутствуют</p>
                        @endforelse

                            {{ $news->links() }}
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection