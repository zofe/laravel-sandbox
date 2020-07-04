@extends('layouts.master')

@section('title'){{ $post->seo_title }}@overwrite
@section('description'){{ $post->seo_description }}@overwrite


@section('meta')
    @if ($post->photo)
        @parent
    <meta property="og:image" content="{{ asset('/uploads/posts/'.$post->photo) }}" />
    @endif
@stop

 
 
@section('content')


{!! Breadcrumbs::render('post', $post->maincat, $post) !!}


<div itemscope itemtype="http://schema.org/TechArticle">
    
    <h1 itemprop="name">{{ $post->title }}</h1>
    
    <div class="row">

    <div class="col-sm-6">
    </div>

    <div class="col-sm-6"><span class="pull-right" id="rate"></span><span class="pull-right" id="rate_response">vota &nbsp;</span></div>
    </div>
    
    @if ($post->photo)  
        <img class="img-responsive post-photo" src="/uploads/posts/{{$post->photo}}" />
    @endif
    
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- testuale -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:468px;height:15px"
         data-ad-client="ca-pub-8004900008133776"
         data-ad-slot="3913365849"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

    <br />
    <br />
    
    <script>
        post_rate('post', {{$post->id}}, {{ $post->rating }}, '{{ csrf_token() }}');
    </script>
    <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" >
        <meta itemprop="ratingValue" content="{{ $post->rating }}" />
        <meta itemprop="ratingCount" content="{{ $post->rating_count }}" />
    </div>
    
    
    {!! $post->description !!}
    <br />
    <br />

    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'rapyd'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>


    <br />
    <br />
     <meta itemprop="proficiencyLevel" content="Beginner">
     <meta itemprop="articleSection" content="{{ $post->maincat }}">
     <meta itemprop="datePublished" content="{{ date('Y-m-d',strtotime($post->created_at))}}">
     <meta itemprop="dateModified" content="{{ date('Y-m-d',strtotime($post->updated_at))}}">
    {{--<span itemprop="author">{{ $post->user->pseudo }}</span>--}}
</div>


@stop