<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Annonce\UpdateRequest;
use App\Http\Resources\BlogResource;
use App\Http\Resources\Partial\CityResource;
use App\Http\Resources\User\AnnonceResource;
use App\Http\Resources\User\CategoryoccupationByStatusResource;
use App\Http\Resources\User\OccupationByStatusResource;
use App\Http\Resources\UserResource;
use App\Model\admin\annonce;
use App\Model\admin\blog;
use App\Model\admin\categoryoccupation;
use App\Model\admin\categoryfaq;
use App\Model\admin\city;
use App\Model\admin\faq;
use App\Model\admin\occupation;
use App\Model\user\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MultiplesRouteTraitementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function annonceshow(occupation $occupation,$id)
    {
        $annonce = new AnnonceResource(annonce::whereId($id)->firstOrFail());

        return response()->json($annonce,200);

    }

    public function annoncesedit(occupation $occupation,$id)
    {
        $annonce = annonce::findOrFail($id);
        return view('user.annonce.edit',[
            'occupation' => $occupation,
            'annonce' => $annonce,
        ]);
    }

    public function annoncesupdate(UpdateRequest $request,occupation $occupation,$id)
    {
        $annonce = annonce::findOrFail($id);

        $annonce->update($request->all());

    }
}
