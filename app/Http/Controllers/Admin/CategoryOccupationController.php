<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryOccupations\StoreRequest;
use App\Http\Requests\CategoryOccupations\UpdateRequest;
use App\Http\Resources\CategoryOccupationResource;
use App\Model\admin\categoryoccupation;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category_occupations.index');
    }

    public function api()
    {
        $categoryoccupations = CategoryOccupationResource::collection(categoryoccupation::with('user')->latest()->get());

        return response()->json($categoryoccupations,200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_occupations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function show(categoryoccupation $categoryoccupation)
    {
        $categoryoccupation = new CategoryOccupationResource(categoryoccupation::where('id', $categoryoccupation->id)
            ->findOrFail($categoryoccupation->id));

        return  response()->json($categoryoccupation,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  categoryoccupation $categoryoccupation
     * @return \Illuminate\Http\Response
     */
    public function edit(categoryoccupation $categoryoccupation)
    {
        $categoryoccupation = categoryoccupation::where('id', $categoryoccupation->id)->findOrFail($categoryoccupation->id);
        return view('admin.category_occupations.edit',compact('categoryoccupation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  categoryoccupation $categoryoccupation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, categoryoccupation $categoryoccupation)
    {
        $inputs = $request->all();

        $categoryoccupation = categoryoccupation::findOrFail($categoryoccupation->id);

        $categoryoccupation->update($inputs);

        return response()->json($categoryoccupation,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  categoryoccupation $categoryoccupation
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(categoryoccupation $categoryoccupation)
    {
        $categoryoccupation = categoryoccupation::findOrFail($categoryoccupation->id);
        $categoryoccupation->delete();

        return ['message' => 'Deleted successfully'];
    }
}
