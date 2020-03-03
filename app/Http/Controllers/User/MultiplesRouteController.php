<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\OccupationResource;
use App\Http\Resources\Info\ConditionResource;
use App\Http\Resources\Info\PolicyprivacyResource;
use App\Http\Resources\Info\licencesiteResource;
use App\Http\Resources\UserResource;
use App\Model\admin\annonce;
use App\Model\admin\info\condition;
use App\Model\admin\info\licencesite;
use App\Model\admin\info\policyprivacy;
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

    public function apiconditions()
    {
        $conditions = ConditionResource::collection(condition::where('status',1)
            ->with('user')->get());
        return response()->json($conditions,200);
    }


    public function politiques()
    {
        return view('user.infos.politique.index');
    }


    public function apiconfidentialities()
    {
        $confidentialities = PolicyprivacyResource::collection(policyprivacy::where('status',1)
        ->with('user')->get());

        return response()->json($confidentialities,200);
    }

    public function licence()
    {
        return view('user.infos.licence.index');
    }

    public function apilicences()
    {
        $licences = LicencesiteResource::collection(licencesite::where('status',1)
        ->with('user')->get());

        return response()->json($licences,200);
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

    public function apioccupationbyslug(occupation $occupation)
    {
        $occupation = occupation::where('status',1)
            ->withCount(['annonces' => function ($q) use ($occupation){
                $q->where(['status' => 1])
                    ->with('user','occupation','city','categoryoccupation')
                    ->whereIn('occupation_id',[$occupation->id])
                    ->whereHas('city', function ($q) {$q->where('status',1);})
                    ->whereHas('occupation', function ($q) {$q->where('status',1);})
                    ->whereHas('categoryoccupation', function ($q) use ($occupation) {
                        $q->where('status',1)->whereIn('occupation_id',[$occupation->id]);});
            }])->whereSlug($occupation->slug)
            ->with([
                'categoryoccupations' => function ($q) use ($occupation){
                    $q->where(['status' => 1])
                        ->whereIn('occupation_id',[$occupation->id])
                        ->with('user','occupation','color')
                        ->whereHas('occupation', function ($q) {$q->where('status',1);})
                        ->orderBy('created_at','DESC')->distinct()->get()->toArray();},
                ])->with([
                'blogs' => function ($q) use ($occupation){
                    $q->where(['status' => 1])
                        ->whereIn('occupation_id',[$occupation->id])
                        ->with('occupation','user','color')
                        ->whereHas('occupation', function ($q) {$q->where('status',1);})
                        ->orderBy('created_at','DESC')->take(3)->distinct()->get()->toArray();},
                ])
            ->first();

        return response()->json($occupation,200);
    }


    public function apicategoryoccupationbyslug(occupation $occupation,categoryoccupation $categoryoccupation)
    {
        $categoryoccupation = categoryoccupation::whereSlug($categoryoccupation->slug)
            ->with('user','occupation','color')
            ->withCount(['annonces' => function ($q) use ($occupation){
                $q->where(['status' => 1])
                    ->with('user','occupation','city','categoryoccupation')
                    ->whereIn('occupation_id',[$occupation->id])
                    ->whereHas('city', function ($q) {$q->where('status',1);})
                    ->whereHas('occupation', function ($q) {$q->where('status',1);})
                    ->whereHas('categoryoccupation', function ($q) use ($occupation) {
                        $q->where('status',1)->whereIn('occupation_id',[$occupation->id]);});
            }])->with([
                'annonces' => function ($q) use ($occupation,$categoryoccupation){
                    $q->where(['status' => 1])
                        ->with('user','occupation','city','categoryoccupation')
                        ->whereIn('occupation_id',[$occupation->id])
                        ->whereIn('categoryoccupation_id',[$categoryoccupation->id])
                        ->whereHas('city', function ($q) {$q->where('status',1);})
                        ->whereHas('occupation', function ($q) {$q->where('status',1);})
                        ->whereHas('categoryoccupation', function ($q) {$q->where('status',1);})
                        ->orderBy('created_at','DESC')->take(3)->distinct()->get()->toArray();},
            ])->first();

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

    public function annoncesbyoccupation(occupation $occupation, annonce $annonce)
    {
        return view('user.annonce.annonce_by_occupation',[
            'occupation' => $occupation,
            'annonce' => $annonce,
        ]);
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


    public function annoncesbycityslug(city $city)
    {
        return view('user.annonce.annonce_by_city',[
            'city' => $city,
        ]);
    }


    public function annoncesbycity($occupation,$categoryoccupation,city $city, annonce $annonce)
    {
        return view('user.annonce.annonce_by_city',[
            'city' => $city,
            'annonce' => $annonce,
        ]);
    }

    public function annoncesoccupationshow($occupation,$categoryoccupation,$city,annonce $annonce)
    {
        $annonce->visits()->increment();
        return view('user.annonce.show',[
            'annonce' => $annonce,
        ]);
    }

    public function charbonneurs()
    {
        return view('user.charbonneur.charbonneurs');
    }

    public function apicharbonneurs()
    {
        $charbonneurs = UserResource::collection(User::where('charbonneur',1)
            ->with('city')
            ->whereHas('city', function ($q) {$q->where('status',1);})
            ->orderBy('created_at', 'DESC')->paginate(40));

        return response()->json($charbonneurs,200);
    }

    public function charbonneursbyoccupation(occupation $occupation)
    {
        return view('user.charbonneur.charbonneurs_by_occupation',[
            'occupation' => $occupation,
        ]);
    }


    public function apicharbonneursbyoccupation(occupation $occupation)
    {
        $charbonneursbyoccupation= occupation::whereSlug($occupation->slug)->with('user')

            ->withCount(['userbyoccupations' => function ($q) use ($occupation){
                $q->with('city','occupation','profile')
                    ->whereIn('occupation_id',[$occupation->id])
                    ->whereHas('occupation', function ($q) {$q->where('status',1);})
                    ->whereHas('city', function ($q) {$q->where('status',1);});
            }])->with([
            'userbyoccupations' => function ($q) use ($occupation){
                $q->with('city','occupation','profile')
                    ->whereIn('occupation_id',[$occupation->id])
                    ->whereHas('city', function ($q) {$q->where('status',1);})
                    ->whereHas('occupation', function ($q) {$q->where('status',1);})
                    ->orderBy('created_at','DESC')->distinct()->get()->toArray();},
            ])
            ->firstOrFail();

        return response()->json($charbonneursbyoccupation,200);
    }

    public function apicharbonneursbyoccupationcity(occupation $occupation,city $city)
    {
        $charbonneursbyoccupationcity = city::whereSlug($city->slug)->with('user')

            ->withCount(['userbycities' => function ($q) use ($occupation,$city){
                $q->with('city','occupation','profile')
                    ->whereIn('occupation_id',[$occupation->id])
                    ->whereIn('city_id',[$city->id])
                    ->whereHas('occupation', function ($q) {$q->where('status',1);})
                    ->whereHas('city', function ($q) {$q->where('status',1);});
            }])->with([
                'userbycities' => function ($q) use ($occupation,$city){
                    $q->with('city','occupation','profile')
                        ->whereIn('occupation_id',[$occupation->id])
                        ->whereIn('city_id',[$city->id])
                        ->whereHas('city', function ($q) {$q->where('status',1);})
                        ->whereHas('occupation', function ($q) {$q->where('status',1);})
                        ->orderBy('created_at','DESC')->distinct()->get()->toArray();},
            ])
            ->firstOrFail();

        return response()->json($charbonneursbyoccupationcity,200);
    }

    public function charbonneursbycity(occupation $occupation,city $city)
    {
        return view('user.charbonneur.charbonneurs_by_city',[
            'city' => $city,
        ]);
    }
    
    public function temoignages()
    {
        return view('user.page.testimonialsite');
    }
}
