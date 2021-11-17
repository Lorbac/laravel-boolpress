@extends('layouts.app')

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
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td scope="row">{{ $category["id"] }}</td>
                                <td>{{ $category["name"] }}</td>
                                <td>{{ $category["slug"] }}</td>
                                
                                <td>
                                    <a href="{{ route("categories.show", $category->id) }}" class="btn btn-info">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection