@extends('frontend.layouts.app')

@section('content')
<div id="content" class="clearfix">
    <section id="posts" class="span-15 append-1">
      
        @foreach($posts as $post)
      <article>
        <div class="date span-3">{{$post->publish_datetime}}</div>
        <h2><a href="#">{{$post->name}}</a></h2>
        
        <img src="{{ asset('storage/img/blog/'.$post->featured_image) }}" alt="">
        <p>{!! $post->content !!}</p>
        <!-- <div class="more"><a href="#">Read more ...</a></div> -->
      </article>
        @endforeach 
    </section>
    <aside class="span-8 last right clearfix">
        <h2><span>Blog Categories </span></h2>
        <ul>
        @foreach($categories as $category)
        <li><a href="{{route('frontend.get.postsByCategory',$category->name)}}">{{ $category->name }}</a></li>
        @endforeach
        </ul>
        
        <h2><span>Blog Tags</span></h2>
        <ul>
        @foreach($tags as $tag)
        <li><a href="{{route('frontend.get.postsByTag',$tag->name)}}">{{ $tag->name }}</a></li>
        @endforeach
                
        </ul>
    </aside>
</div>
          

@endsection