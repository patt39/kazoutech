<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\admin\categoryfaq;
use App\Model\admin\faq;
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

    public function services()
    {
        return view('user.page.services');
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
