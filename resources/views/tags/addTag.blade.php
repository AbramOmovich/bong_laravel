@extends('Main')
@section('title')
        {{ "Добавить Тег" }}
@endsection

@section('message')
    @if ($errors->has('slug'))
        <p class="bg-danger">{{ $errors->first('slug') }}</p>
    @endif
    @if(isset($message))
        <p class="{{$message['class']}}">{{ $message['text'] }}</p>
    @endif
@endsection

@section('Posts')
    <div class="blog-post" >
        <form action="{{Request::url()}}" method="post">
            <h2 class="blog-post-title">{{ "Название тэга" }}</h2>
            <div class="form-group @if($errors->has('title')) {{ 'has-error' }}@endif">
                @if($errors->has('title'))
                    <label class="control-label" for="title"> {{ $errors->first('title') }} </label>
                @endif
                <input type="text" id="title" name="title" class="form-control" height="40" value="{{ old('title') }}">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-default">Добавить</button>
        </form>
    </div>
@endsection

