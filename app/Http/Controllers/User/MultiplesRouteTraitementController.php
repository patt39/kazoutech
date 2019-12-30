<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Annonce\UpdateRequest;
use App\Http\Resources\User\AnnonceResource;
use App\Model\admin\annonce;
use App\Model\admin\occupation;

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


    public function annoncescreate(occupation $occupation)
    {
        return view('user.annonce.create',[
            'occupation' => $occupation,
        ]);
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
