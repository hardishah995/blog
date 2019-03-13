@extends('frontend.layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="row">

        <div class="col-md-8">
            <div class="panel panel-default">
            @if($post->count())
                @foreach($post as $posts)
                <div class="well">
                    <div class="row">
                        <div class="col-md-4">
                            <img style="width:80%" src="{{ asset('storage/img/blog/'.$posts->featured_image) }}" alt="no image found">
                        </div>
                        <div class="col-md-7 col-md-offset-1">
                            <h3><a href="">{{$posts->name}}</a></h3>
                            <small>Written on {{$posts->publish_datetime}}</small>
                            <h5>{{ $posts->content }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            </div><!-- panel -->
        </div><!-- col-md-10 -->
    
        
        <!-- <div class="row"> -->
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{ trans('labels.backend.blogcategories.title') }}</h4>
                    </div><!--panel-heading-->
                    
                    <div class="panel-body">
                    <ul>
                        
                    @foreach($categories as $category)
                        <li><a href="{{route('frontend.get.postsByCategory',$category->name)}}">{{ $category->name }}</a></li>
                    @endforeach
                                
                    
                    </ul>
                    </div><!--panel-body-->
                </div><!--panel-->

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{ trans('labels.backend.blogtags.title') }}</h4>
                    </div><!--panel-heading-->
                    
                    <div class="panel-body">
                    <ul>
                        
                    @foreach($tags as $tag)
                        <div class="btn btn-info"><a href="{{route('frontend.get.postsByTag',$tag->name)}}">{{ $tag->name }}</a></div>
                    @endforeach
                                
                    
                    </ul>
                    </div><!--panel-body-->
                </div><!--panel-->
            </div>
        <!-- </div>row -->
    </div>
    </div>
@endsection