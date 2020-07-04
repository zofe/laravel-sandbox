@extends('layouts.master')

@section('content')
	
@if ($post)
	<div class="container">
		<div class="row">
			
			<h2>{{ $post->title }}</h2>
		
			@if ($post->photo)
				<img class="img-responsive post-photo" src="/uploads/posts/{{$post->photo}}" />
			@endif
		
			{{ mb_substr(strip_tags($post->description), 0 ,100) }}
			<a href="{{ URL::route('posts.page', array('slug'=>$post->sef, 'maincat'=>$post->maincat) ) }}">..read more about {{ $post->title }}..</a>
			
		</div>
	</div>
@endif
	
@endsection

