@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Visualizzo il tag {{ $tag["name"] }}</h1>
            </div>
            <div class="col-12 m-5">
                <h2>Lista dei post collegati ai tag:</h2>

                <ul>
                    @foreach ($tag->posts as $post)
                        <li><a href="{{ route("admin.posts.show", $post->id) }}">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection