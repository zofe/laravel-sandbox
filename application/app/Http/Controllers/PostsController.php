<?php namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller {

	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function showList($maincat, $page='')
	{
		$posts = Post::where('maincat', '=', $maincat)->orderBy('created_at','desc')->paginate(2);
		return view('posts.posts', array('posts'=> $posts, 'maincat'=> $maincat));
	}

	public function showPost($maincat, $slug)
	{
		$post = Post::where('maincat', '=', $maincat)->where('sef', '=', $slug)->first();
		if (!$post) {
			App::abort(404);
		}

		return  view('posts.post', array('post' => $post));

	}

}
