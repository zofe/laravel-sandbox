@extends('layouts.master')


@section('content')


{!! Breadcrumbs::render('posts', $maincat) !!}

    <div class="row">
        <div class="col-md-12">
         
            @foreach ($posts as $post)
            <div class="col-sm-6 col-xs-12">
                <div class="post-box">
                    <a href="{{ URL::route('posts.page', array('slug'=>$post->sef, 'maincat'=>$post->maincat) ) }}">
                    @if ($post->photo)  
                     <img class="img-responsive" src="/thumb/280x100/uploads/posts/{{$post->photo}}" />
                    @endif
                    {{ $post->title }}</a><br />
                    {{ mb_substr(strip_tags($post->description), 0 ,100) }}.. 
                </div>
                
            </div>
            @endforeach
        </div>
   </div>

    {{  $posts->render() }}
    
@stop