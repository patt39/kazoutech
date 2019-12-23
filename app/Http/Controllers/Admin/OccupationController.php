<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Occupations\StoreRequest;
use App\Http\Requests\Occupations\UpdateRequest;
use App\Http\Resources\OccupationResource;
use App\Http\Resources\User\OccupationByStatusResource;
use App\Model\admin\categoryoccupation;
use App\Model\admin\occupation;
use App\Services\Admin\OccupationService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;
use File;

class OccupationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','activestatus','apioccupationbyslug']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        //$trash = color::onlyTrashed()->get();
        return view('admin.occupation.index');
    }


    public function api()
    {
        $occupations = Cache::rememberForever('occupations', function () {
            return OccupationResource::collection(occupation::with('user')->latest()->get());
        });
        return $occupations;
    }


    public function apioccupationbyslug($slug)
    {
        $occupation = new OccupationByStatusResource(occupation::whereSlug($slug)->firstOrFail());

        return response()->json($occupation,200);
    }

    public function occupation(occupation $occupation)
    {
        return view('admin.occupation.show',[
            'occupation' => $occupation,
        ]);
    }

    public function occupationcreate(occupation $occupation)
    {
        return view('admin.occupation.show',[
            'occupation' => $occupation,
        ]);
    }

    public function occupationedit(occupation $occupation,$id)
    {
        $categoryoccupation = categoryoccupation::findOrFail($id);
        return view('admin.category_occupations.edit',[
            'categoryoccupation' => $categoryoccupation,
            'occupation' => $occupation,
        ]);
    }

    public function activestatus()
    {
        $occupations = OccupationByStatusResource::collection(occupation::where('status',1)->latest()->get());

        return response()->json($occupations,200);
    }

    public function apibystatus()
    {
        $occupations =   OccupationByStatusResource::collection(occupation::with('user')
            ->where('status',1)->latest()->get());
        return $occupations;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|View
     */
    public function create()
    {
        return view('admin.occupation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        $occupation = new occupation;
        $occupation->fill($request->all());;

        OccupationService::storeUploadImage($request,$occupation);

        $occupation->save();

        return response('Created',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $category = new OccupationResource(occupation::where('id', $id)->findOrFail($id));

        return response()->json($category,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit($id)
    {
        $occupation = occupation::where('id', $id)->findOrFail($id);
        return view('admin.occupation.edit', compact('occupation'));
    }

    public function disable(occupation $occupation, $id)
    {
        $occupation = occupation::where('id', $id)->findOrFail($id);
        $occupation->update([
            'status' => 0,
            ]);
        return response('Deactivated',Response::HTTP_ACCEPTED);
    }


    public function active(occupation $occupation, $id)
    {
        $occupation = occupation::where('id', $id)->findOrFail($id);
        $occupation->update([
            'status' => 1,
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
    public function update(UpdateRequest $request, $id)
    {

        $occupation = occupation::findOrFail($id);

        OccupationService::updateUploadeImage($request, $occupation);

        $occupation->update($request->all());

        return ['message' => 'Occupation has ben updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $occupation = occupation::findOrFail($id);
        $oldFilename = $occupation->photo;
        File::delete(public_path($oldFilename));
        $occupation->delete();

        return ['message' => 'color deleted '];
    }
}
