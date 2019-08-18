@extends('layouts.app')

@section('content')
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif

    <a href="{{ url('/add') }}">Add New Content</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>tags</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($contents as $content)
            <tr>
                <td>{{$content->id}}</td>
                <td>{{$content->title}}</td>
                <td>{{$content->description}}</td>
                <td>{{$content->tags}}</td>
                <td><a href="{{action('ContentController@edit', $content->id)}}" class="btn btn-default">Edit</a></td>
                <td>
                    <form action="{{action('ContentController@destroy', $content->id)}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection