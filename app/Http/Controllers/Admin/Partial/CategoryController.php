<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Resources\CategoryResource;
use App\Model\admin\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$trash = color::onlyTrashed()->get();
        return view('admin.partial.category.index');
    }


    public function api()
    {
        $categories = CategoryResource::collection(category::with('user')->latest()->get());
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partial.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|unique:categories',
            'color_name'=>'required',
            'icon'=>'required',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->color_name = $request->color_name;
        $category->user_id = auth()->user()->id;

        $category->save();

        return response('Created',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return CategoryResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = new CategoryResource(category::where('id', $id)->findOrFail($id));

        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::where('id', $id)->findOrFail($id);
        return view('admin.partial.category.edit', compact('category'));
    }

    public function disable($id)
    {
        DB::table('categories')
            ->where('id',$id)
            ->update([
                'status' => 0,
                'user_id' => auth()->user()->id,
            ]);

        return response('Disactivated',Response::HTTP_ACCEPTED);
    }

    public function active($id)
    {
        DB::table('categories')
            ->where('id',$id)
            ->update([
                'status' => 1,
                'user_id' => auth()->user()->id,
            ]);

        return response('Activated',Response::HTTP_ACCEPTED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=> "required|string|min:2|max:25|unique:categories,name,{$id}",
            'color_name'=>'required',
            'icon'=>'required',
        ]);

        $category = category::findOrFail($id);

        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->color_name = $request->color_name;
        $category->user_id = auth()->user()->id;

        $category->save();

        return ['message' => 'Category has been updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::findOrFail($id);
        $category->delete();

        return ['message' => 'Category deleted '];
    }
}
