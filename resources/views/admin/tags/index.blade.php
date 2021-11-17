@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Tags</h1>
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
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td scope="row">{{ $tag["id"] }}</td>
                                <td>{{ $tag["name"] }}</td>
                                <td>{{ $tag["slug"] }}</td>
                                
                                <td>
                                    <a href="{{ route("admin.tags.show", $tag->id) }}" class="btn btn-info">Details</a>
                                    <a href="" class="btn btn-warning">Modify</a>
                                    <form class="d-inline-block delete-tag" method="tag" action="">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete</button>
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