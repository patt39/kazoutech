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
        $annoncecity = new CityResource(city::where('slug',$occupation)->whereSlug($slug)->firstOrFail());

        return response()->json($annoncecity,200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.annonce.index');
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
