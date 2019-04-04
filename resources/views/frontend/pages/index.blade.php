@extends('frontend.layouts.app')

@section('content')
<div class="panel panel-heading">
  <center><img src = "{{asset('css/images/main_image-crop.jpg')}}" ></center>
<div>
<div id="content" class="clearfix">

    <section id="posts" class="span-15 append-1">
      <article>
      
        {!! $page->description !!}
        <!-- <div class="more"><a href="#">Read more ...</a></div> -->
      </article>
        
    </section>
    <aside class="span-8 last right clearfix">
      <h2><span>Recent posts</span></h2>
      @foreach($post as $posts)
      <hr>
        <img src="{{ asset('storage/img/blog/'.$posts->featured_image) }}" width="70" height="64" alt="" class="span-2">
        <h3> <a href="#">{{$posts->name}}</a></h3>
       {!! str_limit($posts->content,200) !!}
        <p class="date">{{$posts->publish_datetime}}</p>
        <hr><div class="more"><a href="#">Read more ...</a></div>
        
        @endforeach 
    </aside>
</div>
     
@endsection