<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use App\Img;
class BlogController extends Controller
{
    
	public function getIndex() {
		$posts = Post::paginate(10);

		return view('blog.index')->withPosts($posts);
	}

    public function getSingle($slug) {
    	// fetch from the DB based on slug
    	$post = Post::where('slug', '=', $slug)->first();
        $imgs = $post->imgs->take(4);
    	// return the view and pass in the post object
    	return view('blog.single')->withPost($post)->withImgs($imgs);
    }
    public function getSingleImage($slug) {
        // fetch from the DB based on slug
        $post = Post::where('slug', '=', $slug)->first();
        $imgs = $post->imgs;
        // return the view and pass in the post object
        return view('blog.singleimage')->withPost($post)->withImgs($imgs);
    }
    public function getSearch()
    {
        $search = Input::get('search');
        $posts = Post::where('title','LIKE','%' . Input::get('search') . '%')->paginate(10);
        return view('blog.index')->withPosts($posts);        
    }
}
