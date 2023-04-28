<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(PostRequest $request)
    {

        // $request->validate([
        //     'title' => 'required',
        //     'post' => 'required',
        //     "is_active" => 'required',
        // ]);

        // Post::create([
        //     "title" => $request->title,
        //     "post" => $request->post,
        //     "is_active" => $request->is_active
        // ]);
        // return redirect()->route('post.index');

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/postimage', $imageName);
            // Storage::putFileAs('public/postimage/', $request->file('image'), $imageName);
        }
        $data['image'] = $imageName;
        // dd($data['image']);
        $data['is_active'] = $request->has("is_active") ? 1 : 0;
        // $data = array_merge($data, ['image' => $imageName, 'is_active' => $request->has("is_active") ? 1 : 0]);
        Post::create($data);

        return redirect()->route('post.index');

        // if ($request->hasFile('image')) {
        //     $imgName = time() . '.' . $request->image->extension();
        //     Storage::putFileAs('public/postImage', $request->file('image'), $imgName);
        // }
        // $data['image'] = $imgName;




        // Post::create([
        //     "title" => $data['title'],
        //     "post" => $data['post'],
        //     "is_active" => $request->has("is_active") ? 1 : 0,
        //     "image" => $imgName
        // ]);


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
    public function update(PostRequest $request, $id)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'post' => 'required',
        //     "is_active" => 'required',

        // ]);


        // $result->update([
        //     "title" => $request->title,
        //     "post" => $request->post,
        //     "is_active" => $request->is_active
        // ]);
        // return redirect()->route('post.index');
        // $request->validate([
        //     'title' => 'required',
        //     'post' => 'required'

        // ]);
        // $result = Post::where('id', $id)->first();
        // $result->update([
        //     "title" => $request->title,
        //     "post" => $request->post,
        //     "is_active" => $request->has("is_active") ? 1 : 0
        // ]);
        $result = Post::where('id', $id)->first();
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/postimage', $imageName);
            // Storage::putFileAs('public/postimage/', $request->file('image'), $imageName);
            $data['image'] = $imageName;
            // dd($data['image']);
        } else {
            $data['image'] = $result->image;
        }
        // dd($data['image']);
        $data['is_active'] = $request->has("is_active") ? 1 : 0;

        // $data = array_merge($data, ['image' => $imageName, 'is_active' => $request->has("is_active") ? 1 : 0]);
        $result->update($data);
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
