<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
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
                <p><small>tags: {{$content->tags}}</small></p>
         </div>
        @endforeach
           </div>
       </div>



</div>
</body>
</html>
<style>
    .title{
        text-transform: capitalize ;
    }
    .logo{
        font-size: 40px;
        font-weight: bold;
    }
    .blog_summary{
        border-top: 2px double gainsboro;
        padding:10px;
        width: 50%;
        margin: 0 auto;
    }
    .col-centered{
        float: none;
        margin: 0 auto;
    }
</style>