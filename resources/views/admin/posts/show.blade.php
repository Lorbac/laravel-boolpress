@extends('layouts.dashboard')

@section('content')
    <div class="contain">
        <div class="row">
            <div class="col-12">
                <h1>Visualizzo post {{ $post["id"] }}</h1>
                <h2>{{ $post["title"] }}</h2>
                <p>{!! $post["content"] !!}</p>

                <small>Categoria di appartenenza: <a href="{{ route("admin.categories.show", $post->category->id) }}">{{ $post->category->name }}</a></small>
            </div>
        </div>
    </div>
@endsection