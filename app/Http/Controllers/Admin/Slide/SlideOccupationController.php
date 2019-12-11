<?php

namespace App\Http\Controllers\Admin\Slide;

use App\Http\Controllers\Controller;
use App\Http\Resources\Slide\SlideOccupationResource;
use App\Http\Resources\User\Partial\SlideOccupationBySatusResource;
use App\Model\admin\slide\slideoccupation;
use Illuminate\Http\Request;

class SlideOccupationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','bystatussitesapi']]);
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
        //
    }

    public function api()
    {
        $slideoccupations = SlideOccupationResource::collection(slideoccupation::with('user','categoryfaq')->latest()->get());

        return response()->json($slideoccupations,200);
    }

    public function bystatussitesapi()
    {
        $slideoccupations = SlideOccupationBySatusResource::collection(slideoccupation::where('status',1)->latest()->get());

        return response()->json($slideoccupations,200);
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
