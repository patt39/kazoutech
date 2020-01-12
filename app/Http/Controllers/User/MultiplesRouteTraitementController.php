<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Http\Requests\User\Annonce\UpdateRequest;
use App\Http\Resources\BlogResource;
use App\Http\Resources\User\AnnonceResource;
use App\Model\admin\annonce;
use App\Model\admin\blog;
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

    public function blogscreate()
    {
        return view('user.blog.create');
    }

    public function annonceshow(occupation $occupation,$id)
    {
        $annonce = new AnnonceResource(annonce::whereId($id)->firstOrFail());

        return response()->json($annonce,200);

    }

    public function annoncesedit(occupation $occupation,$id)
    {
        $annonce = annonce::findOrFail($id);
        $this->authorize('update',$annonce);
        if(auth()->user()->id === $annonce->user_id) {

            return view('user.annonce.edit',[
                'occupation' => $occupation,
                'annonce' => $annonce,
            ]);
        }else{
            return ['error',"Unauthorized edit this article contact Author."];
        }
    }

    public function annoncelike(occupation $occupation,$id)
    {

        $annonce = annonce::where('id', $id)->findOrFail($id);

        $response = auth()->user()->toggleLike($annonce);
        return response()->json(['success'=>$response]);

    }

    public function annoncesupdate(UpdateRequest $request,occupation $occupation,$id)
    {
        $annonce = annonce::findOrFail($id);

        $annonce->update($request->all());

    }

    public function blogshow($id)
    {
        $blog = new BlogResource(blog::whereId($id)->firstOrFail());
        return response()->json($blog,200);

    }

    public function blogedit($id)
    {
        $blog = blog::findOrFail($id);
        $this->authorize('update',$blog);
        if(auth()->user()->id === $blog->user_id) {
            return view('user.blog.edit',[
                'blog' => $blog,
            ]);
        }else{
            return ['error',"Unauthorized edit this article contact Author."];
        }
    }
}
