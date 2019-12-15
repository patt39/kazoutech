<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryOccupations\StoreCategoryCoccupationRequest;
use App\Http\Requests\CategoryOccupations\StoreRequest;
use App\Http\Requests\CategoryOccupations\UpdateRequest;
use App\Http\Resources\CategoryOccupationResource;
use App\Model\admin\categoryoccupation;
use App\Model\admin\occupation;
use App\Services\Admin\CategoryOccupationService;
use Illuminate\Http\Response;
use Illuminate\View\View;

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


    public function storecategoryoccupation(StoreCategoryCoccupationRequest $request, occupation $occupation)
    {
        $categoryoccupation = new categoryoccupation();

        $categoryoccupation->fill($request->all());
        $categoryoccupation->occupation_id = $occupation->id;

        CategoryOccupationService::storeUploadImage($request,$categoryoccupation);

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
        $categoryoccupation = categoryoccupation::findOrFail($id);

        CategoryOccupationService::updateUploadeImage($request,$categoryoccupation);

        $categoryoccupation->update($request->all());

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
