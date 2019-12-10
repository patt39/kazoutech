<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryOccupations\StoreRequest;
use App\Http\Requests\CategoryOccupations\UpdateRequest;
use App\Http\Resources\CategoryOccupationResource;
use App\Model\admin\category_occupation;
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
        $categoryoccupations = CategoryOccupationResource::collection(category_occupation::with('user')->latest()->get());

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

        $categoryoccupation = new category_occupation();

        $categoryoccupation->fill($inputs);

        $categoryoccupation->save();

        return response()->json($categoryoccupation,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  category_occupation $categoryoccupation
     * @return \Illuminate\Http\Response
     */
    public function show(category_occupation $categoryoccupation)
    {
        $categoryoccupation = new CategoryOccupationResource(category_occupation::where('id', $categoryoccupation->id)
            ->findOrFail($categoryoccupation->id));

        return  response()->json($categoryoccupation,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  category_occupation $categoryoccupation
     * @return \Illuminate\Http\Response
     */
    public function edit(category_occupation $categoryoccupation)
    {
        $categoryoccupation = category_occupation::where('id', $categoryoccupation->id)->findOrFail($categoryoccupation->id);
        return view('admin.category_occupations.edit',compact('categoryoccupation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  category_occupation $categoryoccupation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, category_occupation $categoryoccupation)
    {
        $inputs = $request->all();

        $categoryoccupation = category_occupation::findOrFail($categoryoccupation->id);

        $categoryoccupation->update($inputs);

        return response()->json($categoryoccupation,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  category_occupation $categoryoccupation
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(category_occupation $categoryoccupation)
    {
        $categoryoccupation = category_occupation::findOrFail($categoryoccupation->id);
        $categoryoccupation->delete();

        return ['message' => 'Deleted successfully'];
    }
}
