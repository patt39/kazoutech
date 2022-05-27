<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Http\Requests\User\Annonce\StoreRequest;
use App\Http\Requests\User\Annonce\UpdateRequest;
use App\Http\Resources\BlogResource;
use App\Http\Resources\User\AnnonceResource;
use App\Model\admin\annonce;
use App\Model\admin\blog;
use App\Model\admin\categoryoccupation;
use App\Model\admin\occupation;
use App\Services\Admin\BlogService;
use Symfony\Component\HttpFoundation\Response;

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

    public function annoncesbycategoryoccupationcreate(occupation $occupation,categoryoccupation  $categoryoccupation)
    {
        return view('user.annonce.categoryoccupationcreate',[
            'occupation' => $occupation,
            'categoryoccupation' => $categoryoccupation,
        ]);
    }

    public function annoncesbycategoryoccupationstore(StoreRequest $request, occupation $occupation,categoryoccupation  $categoryoccupation)
    {
        $annonce = new annonce();

        $annonce->fill($request->all());
        $annonce->occupation_id = $occupation->id;
        $categoryoccupation->categoryoccupation_id = $categoryoccupation->id;

        //CategoryOccupationService::storeUploadImage($request,$categoryoccupation);

        $annonce->save();

        return response()->json($annonce,200);
    }

    public function blogscreate()
    {
        return view('user.blog.create');
    }

    public function blogsstore(StoreBlogRequest $request)
    {
        $blog= new blog();

        $blog->fill($request->all());
        BlogService::storeUploadImage($request,$blog);
        $blog->save();

        return response('Created',Response::HTTP_CREATED);
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
            return ['Error',"Unauthorized editing this article contact Author."];
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
            return ['Error',"Unauthorized editing this article please contact Author."];
        }
    }
}
