<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Author;
use App\Models\Blog;

use App\Repository\Blog\BlogRepoInterFace;
use App\Services\Blog\BlogServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{

    private $blogRepo;
    private $blogService;

    public function __construct(BlogRepoInterFace $blogRepo, BlogServiceInterface $blogService)
    {
        $this->blogRepo = $blogRepo;
        $this->blogService = $blogService;
        $this->middleware('permission:blog_List', ['only' => ['index']]);
        $this->middleware('permission:blogCreate', ['only' => ['create']]);
        $this->middleware('permission:blogedit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:blogdelete', ['only' => ['destroy']]);
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Configuring The Locale default change in one page
        // App::setLocale('jp');

        //
        //relationship 
        // $data = Blog::with('author')->get();
        $data = $this->blogRepo->get();
        // dd($data);
        // $data = Blog::all();
        // $data = Blog::limit(2)->get();

        // return response()->json($data);

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

        $username =  Auth::user()->name;
        Log::info("Add Blog", ["User $username viewed add blog page."]);
        $author = $this->blogRepo->create();
        return view("backend.Blog.addBlog", compact('author'));
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
        // dd($request->all());
        $this->blogService->store($request->validated());
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
        // $result = Blog::where('id', $data)->first();
        $result = $this->blogRepo->show($data);
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
        $author = Author::all();
        // $result = $this->blogRepo->edit($id);
        return view("backend.Blog.editBlog", compact('result', 'author'));
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

        // $result = Blog::where('id', $id)->first();
        // $result->update($request->all());
        // $data = $request->validated();
        // if ($request->hasFile('img')) {
        //     $imageName = time() . '.' . $request->img->extension();
        //     $request->img->move(public_path('images'), $imageName);
        //     $data['img'] =  $imageName;
        // } else {
        //     $data['img'] = $result->img;
        // }


        // $result->update($data);


        $this->blogService->update($request->validated(), $id);
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


    //step 3  catch parameter from url
    //step 4 creat new php artisan make middleware : localMiddleware to effect every page language change 
    public function locale($code)
    {
        // echo $lang;
        // session(['locale' => $lang]);
        session()->put("locale", $code);
        return back();
    }
}
