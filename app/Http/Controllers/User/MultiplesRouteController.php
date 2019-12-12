<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\OccupationByStatusResource;
use App\Model\admin\categoryfaq;
use App\Model\admin\faq;
use App\Model\admin\occupation;
use Illuminate\Http\Request;

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

    public function apioccupationbyslug($slug)
    {
        $occupation = new OccupationByStatusResource(occupation::whereSlug($slug)->firstOrFail());

        return response()->json($occupation,200);
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function faqs()
    {
        $faqs = faq::where('status',1)->with('user','categoryfaq')
                ->orderBy('created_at','DESC')->get();
        return view('user.page.faqs',
            compact('faqs')
        );
    }

    /**
     * @param $categoryfaq
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
