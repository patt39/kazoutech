<?php

namespace App\Http\Controllers;

use App\Jobs\MailTaskEmailJob;
use App\Model\admin\contact;
use App\Model\admin\note;
use App\Model\admin\task;
use App\Model\user\downloadcv;
use App\Model\user\User;
use App\Services\Admin\MailTaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DownloadcvController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('test');
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
        if ($request->ajax()) {
            $this->validate($request, [
                'email' => 'bail|required|email',
                'subject' => 'bail|required|max:250',
                'message' => 'bail|required|max:250'
            ]);

            $contact = new Contact;

            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $slug = sha1(date('YmdHis') . str_random(30));
            $contact->slug = $slug;

            return response ()->json ();
        }
        abort(404);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\user\downloadcv  $downloadcv
     * @return \Illuminate\Http\Response
     */
    public function show(downloadcv $downloadcv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\user\downloadcv  $downloadcv
     * @return \Illuminate\Http\Response
     */
    public function edit(downloadcv $downloadcv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\user\downloadcv  $downloadcv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, downloadcv $downloadcv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\user\downloadcv  $downloadcv
     * @return \Illuminate\Http\Response
     */
    public function destroy(downloadcv $downloadcv)
    {
        //
    }
}
