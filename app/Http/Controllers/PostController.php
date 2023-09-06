<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(10);
        // dd($posts);
        return view('posts.index',[
        'posts' => $posts   
        ]);
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);

        $post = new Post([
            'body' => $request->body
        ]);
        $request->user()->posts()->save($post);
    
        return back();
    }
    
    
}
