@extends('layouts.app')

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
                      <small>Categoria di appartenenza: <a href="{{ route("categories.show", $post->category->id) }}">{{ $post->category->name }}</a></small><br/>
                      <small>Tags: <a href=""><a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection