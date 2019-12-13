<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\CategoryoccupationByStatusResource;
use App\Http\Resources\User\OccupationByStatusResource;
use App\Model\admin\categoryoccupation;
use App\Model\admin\categoryfaq;
use App\Model\admin\faq;
use App\Model\admin\occupation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MultiplesRouteController extends Controller
{

    public function about()
    {
        return view('user.page.about');
    }

    public function concept()
    {
        return view('user.page.concept');
    }

    public function occupations()
    {
        return view('user.occupation.occupations');
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
        $occupation = new OccupationByStatusResource(occupation::where('status',1)->whereSlug($slug)->firstOrFail());

        return response()->json($occupation,200);
    }

    public function apicategoryoccupationbyslug(occupation $occupation,$slug)
    {
        $categoryoccupation = new CategoryoccupationByStatusResource(categoryoccupation::whereSlug($slug)->first());

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
}
