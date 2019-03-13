@extends('frontend.layouts.app')

@section('content')
<div id="content" class="clearfix">
    <section id="posts" class="span-20 append-1">
      <h1><span>Recent posts</span></h1>
      @if($post->count())
        @foreach($post as $posts)
      <article>
        <div class="date span-3">{{$posts->publish_datetime}}</div>
        <h2><a href="#">{{$posts->name}}</a></h2>
        <div class="metadata">
          <ul>
            <li>posted by <a href="#">{{$posts->created_by}}</a></li>
            <li>  <a href="#">a></li>
            <li><a href="#">comments</a></li>
          </ul>
        </div>
        
        <img src="{{ asset('storage/img/blog/'.$posts->featured_image) }}" alt="">
        {!! $posts->content !!}
        <!-- <div class="more"><a href="#">Read more ...</a></div> -->
      </article>
        @endforeach
      @endif
    </section>
    <aside class="span-8 last right clearfix">
        <h2><span>blog categories</span></h2>
        <ul>
        @foreach($categories as $category)
        <li><a href="{{route('frontend.get.postsByCategory',$category->name)}}">{{ $category->name }}</a>
        ({{$categories->count()}})</li>
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