<?php

namespace App\Http\Controllers\Admin;


use App\Http\Resources\OccupationResource;
use App\Http\Resources\Partial\CityResource;
use App\Http\Resources\User\AnnonceResource;
use App\Model\admin\annonce;
use App\Http\Controllers\Controller;
use App\Model\admin\city;
use App\Model\admin\occupation;
use Illuminate\Http\Request;
use File;
use Illuminate\Http\Response;

class AnnonceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','apioccupation','apioccupationcity']]);
    }

    public function api()
    {
        $annonces = AnnonceResource::collection(annonce::with('user','city','occupation')->latest()->get());

        return response()->json($annonces,200);
    }

    public function apioccupation($slug)
    {
        $annonceoccupation = new OccupationResource(occupation::whereSlug($slug)->firstOrFail());

        return response()->json($annonceoccupation,200);
    }

    public function apioccupationcity(occupation $occupation,$slug)
    {

        $annonces = new AnnonceResource(annonce::whereIn('occupation_id',$occupation)->whereSlug($slug)->get());

        dd($annonces);

        return response()->json($annonces,200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.annonce.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|Response
     */
    public function destroy($id)
    {
        $annonce = annonce::findOrFail($id);

         $this->authorize('update',$annonce);
         if(auth()->user()->id === $annonce->user_id) {
             $oldFilename = $annonce->photo;
             File::delete(public_path($oldFilename));
             $annonce->delete();
             return ['message' => 'Annonce deleted '];
         }else{
             return ['error',"Unauthorized edit this article contact Author."];
         }
    }
}
