@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/content') }}">< Back to Content</a>
    <h2 style="text-align: center">Add New Content to Blog</h2><br/>
    <div class="container">
    </div>
    <form method="post" action="{{url('add')}}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Title">Title:</label>
                <input type="text" class="form-control" name="title">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Description">Content Description:</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Tags">Tags:</label>
                <input type="text" class="form-control" name="tags">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection