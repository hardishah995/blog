@extends('frontend.layouts.app')

@section('content')
<div id="content" class="clearfix">
    <section id="posts" class="span-15 append-1">
        <h1><span>Recent posts</span></h1>
      
      
      <article>
        <div class="date span-3"></div>
        <h2><a href="#"></a></h2>
        
        <img src="img/image2" alt="">
        <p>{!! $page->description !!}</p>
        <!-- <div class="more"><a href="#">Read more ...</a></div> -->
      </article>
        
    </section>
    <aside class="span-8 last right clearfix">
        <h2><span>blog categories</span></h2>
        <ul>
        
        </ul>
        
        <h2><span>Blog Tags</span></h2>
        <ul>
        
                
        </ul>
    </aside>
</div>
     
@endsection