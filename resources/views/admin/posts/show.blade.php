@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{ $post["title"] }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post["title"] }}</h5>
                        <p class="card-text">{!! $post["content"] !!}</p>
                        <small>Categoria di appartenenza: <a href="{{ route("admin.categories.show", $post->category->id) }}">{{ $post->category->name }}</a></small><br/>
                        <small>Tags:
                            @foreach ($post->tags as $tag)
                                <a href="{{ route("admin.tags.show", $tag->id) }}">{{ $tag->name }}</a>
                            @endforeach
                        </small>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection