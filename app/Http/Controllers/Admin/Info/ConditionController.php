<?php

namespace App\Http\Controllers\Admin\Info;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Info\ConditionResource;
use App\Model\admin\info\condition;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class ConditionController extends Controller
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
    public function index(): View
    {
        return view('admin.info.condition.index');
    }

    public function api()
    {
        return ConditionResource::collection(condition::with('user')->latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('admin.info.condition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ConditionResource|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string',
            'body'=>'required|string',
        ]);

        $condition = new Condition;
        $condition->title = $request->title;
        $condition->slug = $request->slug;
        $condition->body = $request->body;
        $condition->status = '0';

        $condition->save();

        return new ConditionResource($condition);
    }

    public function unactive_condition($id)
    {
        DB::table('conditions')
            ->where('id',$id)
            ->update([
                'status' => 0,
                'user_id' => auth()->user()->id,
                ]);
        
        return response('Disactivated', Response::HTTP_ACCEPTED);
    }

    public function active_condition($id)
    {
        DB::table('conditions')
            ->where('id',$id)
            ->update([
                'status' => 1,
                'user_id' => auth()->user()->id,
                ]);
        
        return response('Activated', Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ConditionResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $condition = new ConditionResource(condition::where('id', $id)->findOrFail($id));
        return $condition;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $condition = condition::where('id', $id) ->findOrFail($id);
       return view('admin.info.condition.edit', compact('condition'));
    }

    public function view($slug)
    {
        $condition = new ConditionResource(condition::where('slug', $slug)->firstOrFail());
        return $condition;
    }



    public function vector(condition $condition)
    {
        return view('admin.info.condition.view', [
            'condition' => $condition,
        ]);
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
            'body'=>'required',
            'title'=>'required',
        ]);

        $condition = condition::find($id);
    
        $condition->update($request->all());

        return Response(['message' => 'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       $condition = condition::findOrFail($id);
       $oldFilename = $condition->photo;
       File::delete(public_path($oldFilename));

       $condition -> delete();

       return Response(['message' => 'Condition deleted']);
    }
}
