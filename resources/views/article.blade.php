@extends('Main')

@section('title')
    {{ $article->title }}
@endsection

@section('Posts')
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $article->title }}</h2>
        <p class="blog-post-meta">{{ (new DateTime($article->created_at))->format('F d, Y') }} by <a href="">Abram</a></p>
        {{ $article->body }}
    </div>
@endsection

@section('sidebar')
    <form action="{{ Request::url() }}/edit" method="post">
        <button type="submit" class="btn btn-warning btn-lg btn-block"> Редактировать </button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    <br>
    <form action="{{ Request::url() }}/delete" method="post">
        <button type="submit" class="btn btn-danger btn-lg btn-block"> Удалить </button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection

