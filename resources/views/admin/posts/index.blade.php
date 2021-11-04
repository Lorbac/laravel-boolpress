@extends('layouts.dashboard')

@section('content')
    <div class="container_posts_admin">

        <ul>
            @foreach ($posts as $post)
            <a href="{{ route("admin.posts.show", $post["slug"]) }}">
                <li>
                    <h2>{{ $post["title"] }}</h2>
                    <p>{{ $post["content"] }}</p>
                </li>
            </a>
            @endforeach
        </ul>

    </div>
@endsection