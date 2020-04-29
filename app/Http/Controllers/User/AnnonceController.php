<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryOccupationResource;
use App\Http\Resources\OccupationResource;
use App\Http\Resources\Partial\CityResource;
use App\Http\Resources\User\AnnonceResource;
use App\Model\admin\annonce;
use App\Model\admin\categoryoccupation;
use App\Model\admin\city;
use App\Model\admin\occupation;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{


    public function apiannoncesbycities()
    {
        $annonces = city::with('user')
            ->where('status',1)
            ->withCount(['annonces' => function ($q){
                $q->where('status',1)
                    ->with('user','occupation','city','categoryoccupation')
                    ->whereHas('city', function ($q) {$q->where('status',1);})
                    ->whereHas('occupation', function ($q) {$q->where('status',1);})
                    ->whereHas('categoryoccupation', function ($q) {
                        $q->where('status',1);});
            }])->orderBy('annonces_count','desc')->take(6)->distinct()->get();
        return response()->json($annonces,200);
    }
    public function apiannonces()
    {
        $annonces = AnnonceResource::collection(annonce::where('status',1)
            ->with('user','occupation','city','categoryoccupation')
            ->whereHas('city', function ($q) {$q->where('status',1);})
            ->whereHas('occupation', function ($q) {$q->where('status',1);})
            ->whereHas('categoryoccupation', function ($q) {$q->where('status',1);})
            ->orderBy('created_at','DESC')->paginate(40));
        return response()->json($annonces,200);
    }

    public function apiannoncesbycityslug(city $city)
    {
        $annoncebyoccupation = city::where('status',1)
            ->with([
                'annonces' => function ($q) use ($city){
                    $q->where(['status' => 1])
                        ->whereIn('city_id',[$city->id])
                        ->with('user','occupation','city','categoryoccupation')
                        ->whereHas('city', function ($q) use ($city) {$q->where('status',1);})
                        ->whereHas('occupation', function ($q) {$q->where('status',1);})
                        ->whereHas('categoryoccupation', function ($q) {$q->where('status',1);})
                        ->orderBy('created_at','DESC')->distinct()->paginate(40)->toArray();},
            ])
            ->whereSlug($city->slug)->first();

        return response()->json($annoncebyoccupation,200);
    }


    public function apiannoncesbyoccupation(occupation $occupation)
    {
        $annoncebyoccupation = occupation::where('status',1)
        ->withCount(['annonces' => function ($q) use ($occupation){
            $q->where(['status' => 1])
                ->with('user','occupation','city','categoryoccupation')
                ->whereIn('occupation_id',[$occupation->id])
                ->whereHas('city', function ($q) {$q->where('status',1);})
                ->whereHas('occupation', function ($q) {$q->where('status',1);})
                ->whereHas('categoryoccupation', function ($q) use ($occupation) {
                    $q->where('status',1)->whereIn('occupation_id',[$occupation->id]);});
        }])->whereSlug($occupation->slug)->with([
                'annonces' => function ($q) use ($occupation){
                    $q->where(['status' => 1])
                        ->with('user','occupation','city','categoryoccupation')
                        ->whereHas('categoryoccupation', function ($q) use ($occupation) {
                            $q->where('status',1)->whereIn('occupation_id',[$occupation->id]);})
                        ->whereIn('occupation_id',[$occupation->id])
                        ->whereHas('city', function ($q) {$q->where('status',1);})
                        ->whereHas('occupation', function ($q) {$q->where('status',1);})
                        ->orderBy('created_at','DESC')->distinct()->paginate(40)->toArray();},
            ])->with([
                'categoryoccupations' => function ($q) use ($occupation){
                    $q->where(['status' => 1])
                        ->with('user','occupation','color')
                        ->whereIn('occupation_id',[$occupation->id])
                        ->whereHas('occupation', function ($q) {$q->where('status',1);})
                        ->orderBy('created_at','DESC')->distinct()->get()->toArray();},])
            ->first();
        return response()->json($annoncebyoccupation,200);
    }



    public function apiannoncesbycategoryoccupation(occupation $occupation,categoryoccupation $categoryoccupation)
    {
        $annoncesoccupationcategoryoccupation = categoryoccupation::where('status',1)
        ->withCount(['annonces' => function ($q) use ($occupation,$categoryoccupation){
            $q->where(['status' => 1])
                ->with('user','occupation','city','categoryoccupation')
                ->whereIn('occupation_id',[$occupation->id])
                ->whereIn('categoryoccupation_id',[$categoryoccupation->id])
                ->whereHas('city', function ($q) {$q->where('status',1);})
                ->whereHas('occupation', function ($q) {$q->where('status',1);})
                ->whereHas('categoryoccupation', function ($q) use ($occupation) {
                    $q->where('status',1)->whereIn('occupation_id',[$occupation->id]);});
        }])->whereSlug($categoryoccupation->slug)->with([
                'annonces' => function ($q) use ($occupation,$categoryoccupation){
                    $q->where(['status' => 1])
                        ->with('user','occupation','city','categoryoccupation')
                        ->whereIn('occupation_id',[$occupation->id])
                        ->whereIn('categoryoccupation_id',[$categoryoccupation->id])
                        ->whereHas('city', function ($q) {$q->where('status',1);})
                        ->whereHas('occupation', function ($q) {$q->where('status',1);})
                        ->whereHas('categoryoccupation', function ($q) use ($occupation) {
                            $q->where('status',1)->whereIn('occupation_id',[$occupation->id]);})
                        ->orderBy('created_at','DESC')->distinct()->paginate(40)->toArray();},])->first();

        return response()->json($annoncesoccupationcategoryoccupation,200);
    }

    public function apiannoncesbyoccupationcount(occupation $occupation,categoryoccupation $categoryoccupation)
    {
        $annoncebyoccupation = categoryoccupation::with('user','occupation')
            ->withCount(['annonces' => function ($q) use ($occupation,$categoryoccupation){
                $q->where(['status' => 1])
                    ->with('user','occupation','city','categoryoccupation')
                    ->whereIn('occupation_id',[$occupation->id])
                    ->whereIn('categoryoccupation_id',[$categoryoccupation->id])
                    ->whereHas('city', function ($q) {$q->where('status',1);})
                    ->whereHas('occupation', function ($q) {$q->where('status',1);})
                    ->whereHas('categoryoccupation', function ($q) use ($occupation) {
                        $q->where('status',1)->whereIn('occupation_id',[$occupation->id]);});
            }])->orderBy('annonces_count','desc')
            ->where(['status' => 1])
            ->whereIn('occupation_id',[$occupation->id])
            ->whereHas('occupation', function ($q) {$q->where('status',1);})
            ->distinct()->get();
        return response()->json($annoncebyoccupation,200);
    }

    public function apiannoncesbycategoryoccupationcountbycity(occupation $occupation,categoryoccupation $categoryoccupation)
    {
        $annoncesoccupationcategoryoccupation = city::with('user')
            ->withCount(['annonces' => function ($q) use ($occupation,$categoryoccupation){
                $q->where(['status' => 1])
                    ->with('user','occupation','city','categoryoccupation')
                    ->whereIn('occupation_id',[$occupation->id])
                    ->whereIn('categoryoccupation_id',[$categoryoccupation->id])
                    ->whereHas('city', function ($q) {$q->where('status',1);})
                    ->whereHas('occupation', function ($q) {$q->where('status',1);})
                    ->whereHas('categoryoccupation', function ($q) use ($occupation) {
                        $q->where('status',1)->whereIn('occupation_id',[$occupation->id]);});
            }])->orderBy('annonces_count','desc')->take(6)->distinct()->get();

        return response()->json($annoncesoccupationcategoryoccupation,200);
    }


    public function apiannoncesbyoccupationcity(occupation $occupation,categoryoccupation $categoryoccupation,city $city)
    {
        $annoncecity = city::whereSlug($city->slug)
         ->withCount(['annonces' => function ($q) use ($occupation,$categoryoccupation,$city){
            $q->where(['status' => 1])
                ->with('user','occupation','city','categoryoccupation')
                ->whereIn('occupation_id',[$occupation->id])
                ->whereIn('categoryoccupation_id',[$categoryoccupation->id])
                ->whereIn('city_id',[$city->id])
                ->whereHas('city', function ($q) {$q->where('status',1);})
                ->whereHas('occupation', function ($q) {$q->where('status',1);})
                ->whereHas('categoryoccupation', function ($q) use ($occupation) {
                    $q->where('status',1)->whereIn('occupation_id',[$occupation->id]);});
        }])->with([
            'annonces' => function ($q) use ($occupation,$categoryoccupation,$city){
                $q->where(['status' => 1])
                    ->with('user','occupation','city','categoryoccupation')
                    ->whereIn('occupation_id',[$occupation->id])
                    ->whereIn('categoryoccupation_id',[$categoryoccupation->id])
                    ->whereIn('city_id',[$city->id])
                    ->whereHas('city', function ($q) {$q->where('status',1);})
                    ->whereHas('occupation', function ($q) {$q->where('status',1);})
                    ->whereHas('categoryoccupation', function ($q) use ($occupation) {
                        $q->where('status',1)->whereIn('occupation_id',[$occupation->id]);})
                    ->orderBy('created_at','DESC')->distinct()->paginate(40)->toArray();},
        ])->firstOrFail();

        return response()->json($annoncecity,200);
    }

    public function apiannoncesoccupationshow($occupation,$categoryoccupation,$city,annonce $annonce)
    {
        visits($annonce)->seconds(60)->increment();

        $annonce = new AnnonceResource(annonce::whereSlug($annonce->slug)->firstOrFail());

        return response()->json($annonce,200);
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
