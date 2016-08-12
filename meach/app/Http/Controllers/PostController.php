<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

use Auth;

use Redirect;

use View;

use App\Post;

class PostController extends Controller
{

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()){
            //get all posts from DB
            $posts = Post::all();
            // pass posts to the index view
            return View::make('posts.index')->with('posts',$posts);
        }else{
            return Redirect::to('login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title'     => 'required',
            'body'      => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('posts/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // save to database
            $post = new Post;
            $post->title     = $request->input('title');
            $post->body      = $request->input('body');
            $post->user_id   = Auth::id();
            
            $post->save();

            // redirect to the index page
            return Redirect::to('posts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get post by id from DB
        $post = Post::find($id);

        return View::make('posts.view')
            ->with('post', $post);
    }

}