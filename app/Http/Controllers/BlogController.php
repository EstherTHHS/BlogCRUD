<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Blog::all();
        $data = Blog::paginate(3);

        // dd($data);
        return view("backend.Blog.blogList", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.Blog.addBlog");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {

        // dd($request->all());
        // $request->validate([
        //     'title' => 'required',
        //     'blog' => 'required'
        // ]);
        // Blog::create($request->all());
        $data = $request->validated();
        Blog::create($data);
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        $result = Blog::where('id', $data)->first();
        return view("backend.Blog.showBlog", compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Blog::where('id', $id)->first();
        // dd($result);
        return view("backend.Blog.editBlog", compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {

        // $request->validate([
        //     'title' => 'required',
        //     'blog' => 'required'
        // ]);
        $result = Blog::where('id', $id)->first();
        // $result->update([
        //     'title' => $request->title,
        //     'blog' => $request->blog

        // ]);
        // $result->update($request->all());
        $data = $request->validated();
        $result->update($data);
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Blog::where('id', $id)->first();
        $result->delete();
        return redirect()->route('blog.index');
    }
}
