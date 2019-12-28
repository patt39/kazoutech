<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\Blog\StoreRequest;
use App\Http\Requests\Admin\Blog\UpdateRequest;
use App\Services\Admin\BlogService;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Model\admin\blog;
use Illuminate\Http\Request;
use File;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        return view('admin.blog.index');
    }

    public function api()
    {
        $blogs = BlogResource::collection(blog::with('user','occupation','color')->latest()->get());

        return response()->json($blogs,200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $blog= new blog();
        $blog->fill($request->all());;

        BlogService::storeUploadImage($request,$blog);

        $blog->save();

        return response('Created',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = new BlogResource(blog::where('id', $id)->findOrFail($id));
        return response()->json($blog,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = blog::where('id', $id)->findOrFail($id);

        return view('admin.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $blog = blog::findOrFail($id);

        BlogService::updateUploadeImage($request,$blog);

        $blog->update($request->all());

        return response()->json($blog,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        $blog = blog::findOrFail($id);

        $this->authorize('update',$blog);
        if(auth()->user()->id === $blog->user_id) {
            $oldFilename = $blog->photo;
            File::delete(public_path($oldFilename));
            $blog->delete();
            return ['message' => 'Blog post deleted '];
        }else{
            return ['error',"Unauthorized edit this article contact Author."];
        }
    }
}
