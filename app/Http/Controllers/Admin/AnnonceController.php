<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\User\Annonce\AssignedtaskRequest;
use App\Http\Requests\User\Annonce\AssignedtaskupdateRequeste;
use App\Http\Resources\OccupationResource;
use App\Http\Resources\Partial\CityResource;
use App\Http\Resources\User\AnnonceResource;
use App\Http\Resources\User\AssignmentResource;
use App\Model\admin\annonce;
use App\Model\admin\taskuserassign;
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
        $this->middleware('auth',['except' => ['api','apioccupation','apiannonceassigned','apioccupationcity','assignment','assigned']]);
    }

    public function api()
    {
        $annonces = AnnonceResource::collection(annonce::with('user','city','occupation')->latest()->get());

        return response()->json($annonces,200);
    }

    public function apiannonceassigned()
    {
        $annoncesassigned = taskuserassign::with('member','user','annonce')
        ->with([
            'annonce.city' => function ($q){
                $q->select('id','name','status','slug');},
            'annonce.occupation' => function ($q){
                    $q->select('id','name','status','slug');},
            'annonce.categoryoccupation' => function ($q){
                        $q->distinct()->get();},
                    
        ])
        //->whereHas('annonce', function ($q) {$q;})
        ->get();

        return response()->json($annoncesassigned,200);
    }

    public function apioccupation($slug)
    {
        $annonceoccupation = new OccupationResource(occupation::whereSlug($slug)->firstOrFail());

        return response()->json($annonceoccupation,200);
    }


    public function assignedtask(occupation $occupation,city $city,annonce $annonce)
    {
        return view('admin.annonce.assignment');
    }

    public function assignedtaskstore(AssignedtaskRequest $request,occupation $occupation,city $city,annonce $annonce)
    {
        $taskuserassign = new taskuserassign();

        $taskuserassign->fill($request->all());
        $taskuserassign->annonce_id = $annonce->id;

        $taskuserassign->save();

        return response()->json($taskuserassign,200);
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
    public function assigned()
    {
          return view('admin.annonce.assigne');
    }

    public function status($id)
    {
        $annonce = annonce::findOrFail($id);
        $annonce->update(['status' => !$annonce->status]);

        return response()->json($annonce,200);
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

    public function assignedtaskupdate(AssignedtaskupdateRequeste $request,$id)
    {
        $taskuserassign = taskuserassign::findOrFail($id);

        $taskuserassign->update($request->all());

        return ['message' => 'updated successfully'];
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

    public function assignedtaskdelete($id)
    {
        $taskuserassign = taskuserassign::findOrFail($id);

        $taskuserassign->delete();

        return ['message' => 'Annonce deleted '];

    }
}
