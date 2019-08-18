@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/content') }}">< Back to Content</a>
    <h2 style="text-align: center">Edit Content</h2><br/>
    <div class="container">
        <br />
        @if (\Session::has('failure'))
            <div class="alert alert-warning">
                <p>{{ \Session::get('failure') }}</p>
            </div><br />
        @endif

    <form method="post" action="{{action('ContentController@update', $id)}}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Title">Title:</label>
                <input type="text" class="form-control" name="title" value="{{$content->title}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Description">Description:</label>
                <textarea class="form-control" name="description">{{$content->description}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Tags">Tags:</label>
                <input type="text" class="form-control" name="tags" value="{{$content->tags}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection