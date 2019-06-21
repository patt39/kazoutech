<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Resources\Category\CategoryfaqResource;
use App\Model\admin\categoryfaq;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CategoryfaqController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api']]);
        // Middleware lock account
        //$this->middleware('auth.lock');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.faq.categoryfaq');
    }

    public function api()
    {
        return CategoryfaqResource::collection(categoryfaq::with('user')->latest()->get());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'=>'required|string|min:2|max:25|unique:categoryfaqs,name',
            'color_name'=>'required',
            'icon'=>'required',
        ]);
        
        $categoryfaq = new categoryfaq;
        $categoryfaq->name = $request->name;
        $categoryfaq->color_name = $request->color_name;
        $categoryfaq->icon = $request->icon;
        $categoryfaq->user_id = auth()->user()->id;;

        $categoryfaq->save();

        return response('Created',Response::HTTP_CREATED);
    }

    /**
     * disable
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */

    public function disable($id)
    {
        DB::table('categoryfaqs')
            ->where('id',$id)
            ->update([
                'status' => 0,
                'user_id' => auth()->user()->id,
            ]);
        return response('Deactivated',Response::HTTP_ACCEPTED);
    }

    /**
     * Active
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function active($id)
    {
        DB::table('categoryfaqs')
            ->where('id',$id)
            ->update([
                'status' => 1,
                'user_id' => auth()->user()->id,
            ]);

        return response('Activated',Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryfaq = categoryfaq::where('id',$id)->first();
        return view('admin.category.category_faq.edit',compact('categoryfaq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=> "required|string|min:2|max:25|unique:categoryfaqs,name,{$id}",
            'color_name'=>'required',
            'icon'=>'required',
        ]);
        
        $categoryfaq = categoryfaq::findOrFail($id);

        $categoryfaq->name = $request->name;
        $categoryfaq->color_name = $request->color_name;
        $categoryfaq->icon = $request->icon;
        $categoryfaq->user_id = auth()->user()->id;;

        $categoryfaq->save();

        return ['message' => 'category faq has ben updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $categoryfaq = categoryfaq::findOrFail($id);
        $categoryfaq->delete();

        return ['message' => 'category faq deleted '];
    }
}
