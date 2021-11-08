@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Posts</h1>
            @if(session("deleted"))
                <div class="alert alert-danger">
                    {{ session("deleted") }}
                </div>
            @elseif(session("updated"))
                <div class="alert alert-warning">
                    {{ session("updated") }}
                </div>
            @elseif(session("created"))
                <div class="alert alert-success">
                    {{ session("created") }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td scope="row">{{ $post["id"] }}</td>
                            <td>{{ $post["title"] }}</td>
                            <td>{{ $post["slug"] }}</td>
                            <td>
                                <a href="{{ route("posts.show", $post->slug) }}" class="btn btn-info">Dettagli</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection