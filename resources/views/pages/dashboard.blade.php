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
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#news-detail-{{ $post->id }}">
                                                Подробно
                                            </button>
                                            <div class="modal fade" id="news-detail-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="news-detail-{{ $post->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal--news" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ $post->title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <div class="modal-body__image">
                                                               <img src="{{ $post->getImage() }}" alt="{{ $post->title }}">
                                                           </div>
                                                            {!! $post->body !!}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="h4 text-danger text-center">Посты отсутствуют</p>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $news->links() }}
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection