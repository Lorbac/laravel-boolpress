@extends('layouts.dashboard')

@section('content')
    <div class="contain">
        <div class="row">
            <div class="col-12">
                <h1>Visualizzo post {{ $post["id"] }}</h1>
                <h2>{{ $post["title"] }}</h2>
                <p>{!! $post["content"] !!}</p>
            </div>
        </div>
    </div>
@endsection