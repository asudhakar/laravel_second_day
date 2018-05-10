<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;


class PostsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index']);
        $this->middleware('auth');
        
    }

    public function index()
    {
        $posts = Post::latest();

        if($month = request('month')){
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = request('year')){
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->get();


        
        return view('posts.index', compact('posts','archives'));
    }

    public function show(Post $post){
        $archives =  Post::selectRaw('year(created_at) year, monthname(created_at) month,count(*) published')
                    ->groupBy('year', 'month')
                    ->orderByRaw('min(created_at) desc')
                    ->get()
                    ->toArray();
        return view('posts.show', compact('post','archives'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(){

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        

        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->id();
        $post->save();


        //another way
        // Post::Create(request(['title', 'body']));
        return redirect('/');
        
    }

}
