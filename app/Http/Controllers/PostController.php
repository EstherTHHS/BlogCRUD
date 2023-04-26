<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:post_list', ['only' => ['index']]);
        $this->middleware('permission:postCreate', ['only' => ['create']]);
        $this->middleware('permission:postEdit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:postDelete', ['only' => ['destory']]);

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();
        return view("backend.Post.listPost", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.Post.addPost");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'post' => 'required'
        ]);

        Post::create([
            "title" => $request->title,
            "post" => $request->post,
            "is_active" => $request->has("is_active") ? 1 : 0
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Post::where('id', $id)->first();
        return view("backend.Post.showPost", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::where('id', $id)->first();
        return view("backend.Post.editPost", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'post' => 'required'

        ]);

        $result = Post::where('id', $id)->first();
        $result->update([
            "title" => $request->title,
            "post" => $request->post,
            "is_active" => $request->has("is_active") ? 1 : 0
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Post::where('id', $id)->first();
        $result->delete();
        return redirect()->route('post.index');
    }
}
