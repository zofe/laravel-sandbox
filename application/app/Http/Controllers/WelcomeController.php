<?php namespace App\Http\Controllers;

use App\Post;
use Zofe\Burp\Burp;

class WelcomeController extends Controller {

	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		Burp::get(null, 'ord=(-?)(\w+)', array('as'=>'orderby', function($direction, $field) {
			die('fanaffa');
		}));

		Burp::dispatch();
		$post = Post::orderBy('created_at','desc')->first();
		return view('home', compact('post'));
	}

	public function cookie()
	{
		return view('cookie');
	}

	public function cookie_modal()
	{
		return view('cookie_modal');
	}
}
