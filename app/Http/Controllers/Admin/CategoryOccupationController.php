<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryOccupations\StoreRequest;
use App\Http\Requests\CategoryOccupations\UpdateRequest;
use App\Http\Resources\CategoryOccupationResource;
use App\Model\admin\categoryoccupation;
use App\Services\Admin\CategoryOccupationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use File;

class CategoryOccupationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','activestatus']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.category_occupations.index');
    }

    public function api()
    {
        $categoryoccupations = CategoryOccupationResource::collection(categoryoccupation::with('user','occupation')->latest()->get());

        return response()->json($categoryoccupations,200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.category_occupations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(StoreRequest $request)
    {
        $inputs = $request->all();

        $categoryoccupation = new categoryoccupation();

        $categoryoccupation->fill($inputs);


        $categoryoccupation->save();

        return response()->json($categoryoccupation,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  categoryoccupation $categoryoccupation
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        $categoryoccupation = new CategoryOccupationResource(categoryoccupation::where('id', $id)
            ->findOrFail($id));

        return  response()->json($categoryoccupation,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  categoryoccupation $categoryoccupation
     * @return \Illuminate\Contracts\View\Factory|Response|View
     */
    public function edit($id)
    {
        $categoryoccupation = categoryoccupation::where('id', $id)->findOrFail($id);
        return view('admin.category_occupations.edit',compact('categoryoccupation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  categoryoccupation $categoryoccupation
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update(UpdateRequest $request,$id)
    {
        $inputs = $request->all();

        $categoryoccupation = categoryoccupation::findOrFail($id);

        $currentPhoto = $categoryoccupation->photo;

        if ($request->photo != $currentPhoto){
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/categoryoccupations/';
            if(!file_exists($dir)){mkdir($dir, 0775, true);}
            Image::make($request->photo)->save(public_path('assets/img/categoryoccupations/').$name);
            $request->merge(['photo' =>  "/assets/img/categoryoccupations/{$name}"]);
            $oldFilename = $currentPhoto;
            File::delete(public_path($oldFilename));
        }
        $categoryoccupation->update($inputs);

        return response()->json($categoryoccupation,200);
    }

    public function status($id)
    {
        $categoryoccupation = categoryoccupation::findOrFail($id);
        $categoryoccupation->update(['status' => !$categoryoccupation->status]);

        return response()->json($categoryoccupation,200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  categoryoccupation $categoryoccupation
     * @return array|Response
     */
    public function destroy($id)
    {
        $categoryoccupation = categoryoccupation::findOrFail($id);
        $categoryoccupation->delete();

        return ['message' => 'Deleted successfully'];
    }
}
