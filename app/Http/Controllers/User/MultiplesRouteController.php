<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryOccupationResource;
use App\Http\Resources\OccupationResource;
use App\Http\Resources\Partial\CityResource;
use App\Http\Resources\User\AnnonceResource;
use App\Http\Resources\UserResource;
use App\Model\admin\annonce;
use App\Model\admin\blog;
use App\Model\admin\categoryoccupation;
use App\Model\admin\categoryfaq;
use App\Model\admin\city;
use App\Model\admin\faq;
use App\Model\admin\occupation;
use App\Model\user\User;

class MultiplesRouteController extends Controller
{

    public function about()
    {
        return view('user.page.about');
    }

    public function touteslesvilles()
    {
        return view('user.page.touteslesvilles');
    }

    public function concept()
    {
        return view('user.page.concept');
    }

    public function occupations()
    {
        return view('user.occupation.occupations');
    }

    public function conditions()
    {
        return view('user.infos.conditions.index');
    }

    public function politiques()
    {
        return view('user.infos.politique.index');
    }

    public function licence()
    {
        return view('user.infos.licence.index');
    }

    public function occupation(occupation $occupation)
    {
        return view('user.occupation.show',[
           'occupation' => $occupation,
        ]);
    }

    public function categoryoccupation(occupation $occupation, categoryoccupation $categoryoccupation)
    {
        return view('user.occupation.categoryoccupation.show',[
           'occupation' => $occupation,
           'categoryoccupation' => $categoryoccupation,
        ]);
    }

    public function apioccupationbyslug($slug)
    {
        $occupation = new OccupationResource(occupation::where('status',1)
            ->whereSlug($slug)->firstOrFail());

        return response()->json($occupation,200);
    }


    public function apicategoryoccupationbyslug(occupation $occupation,$slug)
    {
        $categoryoccupation = new CategoryOccupationResource(categoryoccupation::whereSlug($slug)->first());

        return response()->json($categoryoccupation,200);
    }

    public function faqs()
    {
        $faqs = faq::where('status',1)->with('user','categoryfaq')
                ->orderBy('created_at','DESC')->get();
        return view('user.page.faqs',
            compact('faqs')
        );
    }


    public function faqsbycategory($categoryfaq)
    {
        $faqs = categoryfaq::whereSlug($categoryfaq)->firstOrFail()->faqs()
            ->where('status',1)->with('user','categoryfaq')
            ->orderBy('created_at','DESC')->get();
        return view('user.page.faqs',
            compact('faqs')
        );
    }


    /* ***********++++++++++++++++++ ++++++++++++++++++++++++++++++++++++++++++++++++++++++ ++++++++++++++++*************** */
    /* ***********++++++++++++++++++ Ici je recuprere toutes Routes pour configurer le blog ++++++++++++++++*************** */
    /* ***********++++++++++++++++++ ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*************** */

    public function blogs()
    {
        return view('user.blog.blog');
    }

    public function apiblogs()
    {
        $blogs = BlogResource::collection(blog::where('status',1)
            ->with('user','occupation','color')
            ->orderBy('created_at','DESC')->get());
        return response()->json($blogs,200);
    }

    public function blogsoccupation(occupation $occupation, blog $blog)
    {
        return view('user.blog.blog_by_occupation',[
            'occupation' => $occupation,
            'blog' => $blog,
        ]);
    }

    public function apiblogsoccupation($slug)
    {
        $occupation = new OccupationResource(occupation::where('status',1)
            ->whereSlug($slug)->firstOrFail());

        return response()->json($occupation,200);
    }

    public function blogsoccupationslug(occupation $occupation,blog $blog)
    {
        return view('user.blog.show',[
            'blog' => $blog,
            'occupation' => $occupation,
        ]);
    }

    public function apiblogsoccupationslug(occupation $occupation,$slug)
    {
        $blog = new BlogResource(blog::whereSlug($slug)->first());
        return response()->json($blog,200);

    }

    public function apilastblogs()
    {
        $blogs = BlogResource::collection(blog::where('status',1)
            ->with('user','occupation','color')
            ->latest()->take(3)->get());
        return response()->json($blogs,200);
    }

    //public function apilastblogsinteresse(occupation $occupation)
    //{
    //    $blogs = BlogResource::collection(blog::where('status',1)
    //        ->whereIn('occupation_id',$occupation)
    //        ->with('user','occupation','color')
    //        ->latest()->get());
    //    return response()->json($blogs,200);
    //}

    public function apilastblogsinteresse(occupation $occupation)
    {
        $blogsinteresse = BlogResource::collection(blog::where('status',1)
            ->where('occupation_id','=',$occupation->id)
            ->with('user','occupation','color')
            ->latest()->take(3)->get());
        return response()->json($blogsinteresse,200);
    }


    /* ***********++++++++++++++++++ ++++++++ ++++++++++++++++*************** */
    /* ***********++++++++++++++++++ END ++++++++++++++++*************** */
    /* ***********++++++++++++++++++ ++++++++++++++++++++++++++++*************** */


    public function annonces()
    {
        return view('user.annonce.annonces');
    }

    public function apiannonces()
    {
        $annonces = AnnonceResource::collection(annonce::where('status',1)
            ->with('user','occupation','city','categoryoccupation')
            ->orderBy('created_at','DESC')->get());
        return response()->json($annonces,200);
    }

    public function annoncesbyoccupation(occupation $occupation, annonce $annonce)
    {
        return view('user.annonce.annonce_by_occupation',[
            'occupation' => $occupation,
            'annonce' => $annonce,
        ]);
    }

    public function apiannoncesbyoccupation($occupation)
    {
        $annoncebyoccupation = new OccupationResource(occupation::where('status',1)
            ->whereSlug($occupation)->firstOrFail());
        return response()->json($annoncebyoccupation,200);
    }

    public function annoncesbyoccupationbycity(occupation $occupation,city $city)
    {
        return view('user.annonce.annonce_by_city',[
            'city' => $city,
            'occupation' => $occupation,
        ]);
    }

    public function annoncesbycategoryoccupation(occupation $occupation,categoryoccupation $categoryoccupation)
    {
        return view('user.annonce.annonce_by_categoryoccupation',[
            'occupation' => $occupation,
            'categoryoccupation' => $categoryoccupation,
        ]);
    }

    public function apiannoncesbycategoryoccupation($occupation,$categoryoccupation)
    {
        $annoncesoccupationcategoryoccupation = new CategoryOccupationResource(categoryoccupation::where('status',1)
            ->whereSlug($categoryoccupation)->first());

        return response()->json($annoncesoccupationcategoryoccupation,200);
    }


    public function annoncesbycity($occupation,$categoryoccupation,city $city, annonce $annonce)
    {
        return view('user.annonce.annonce_by_city',[
            'city' => $city,
            'annonce' => $annonce,
        ]);
    }


    public function apiannoncesbycity($occupation,$categoryoccupation,$city)
    {
        $annoncecity = new CityResource(city::whereSlug($city)->firstOrFail());

        return response()->json($annoncecity,200);
    }

    public function annoncesoccupationshow($occupation,$categoryoccupation,$city,annonce $annonce)
    {
        return view('user.annonce.show',[
            'annonce' => $annonce,
        ]);
    }

    public function apiannoncesoccupationshow($occupation,$categoryoccupation,$city,$annonce)
    {
        $annonce = new AnnonceResource(annonce::whereSlug($annonce)->firstOrFail());

        return response()->json($annonce,200);
    }


    public function charbonneurs()
    {
        return view('user.charbonneur.charbonneurs');
    }

    public function apicharbonneurs()
    {
        $charbonneurs = UserResource::collection(User::where('charbonneur',1)->with('city')
            ->orderBy('created_at', 'DESC')->paginate(10));

        return response()->json($charbonneurs,200);
    }

    public function charbonneursbycity(city $city)
    {
        return view('user.charbonneur.charbonneurs_by_city',[
            'city' => $city,
        ]);
    }
    public function apicharbonneursbycity($city)
    {
        $charbonneursbycity = new CityResource(city::whereSlug($city)->firstOrFail());

        return response()->json($charbonneursbycity,200);
    }

    public function charbonneursbyoccupation($city,occupation $occupation)
    {
        return view('user.charbonneur.charbonneurs_by_occupation',[
            'occupation' => $occupation,
        ]);
    }

    public function apicharbonneursbyoccupation($city,$occupation)
    {
        $charbonneursbyoccupation = new OccupationResource(occupation::whereSlug($occupation)->firstOrFail());

        return response()->json($charbonneursbyoccupation,200);
    }

    public function temoignages()
    {
        return view('user.page.testimonialsite');
    }
}
