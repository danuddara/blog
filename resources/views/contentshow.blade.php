@extends('layouts.app')

@section('content')
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif




       <div class="container">
           <h1 class="text-center logo">YouBlog</h1>
           <div class="col-centered">
        @foreach($contents as $content)
         <div class="blog_summary ">
                <a id="{{$content->id}}"><h3 class="title">{{$content->title}}</h3></a>
                <p>{{$content->description}}</p>
                <p><small>tags: {{$content->tags}}</small>
                <small style="text-align: right">, Date: {{ date('d-M-y h:m:s', strtotime($content->created_at))}}</small></p>
         </div>
        @endforeach
           </div>
       </div>



</div>
@endsection