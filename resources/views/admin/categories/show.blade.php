@extends('layouts.dashboard')

@section('content')
    <div class="contain">
        <div class="row">
            <div class="col-12">
                <h1>Visualizzo la categoria {{ $category["name"] }}</h1>
            </div>
            <div class="col-12 m-5">
                <h2>Lista dei post collegati alla categoria:</h2>

                <ul>
                    @foreach ($category->posts as $post)
                        <li><a href="{{ route("admin.posts.show", $post->id) }}">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection