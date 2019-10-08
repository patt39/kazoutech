<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\SubscriberResource;
use App\Model\user\subscriber;
use Illuminate\Http\Request;
use Spatie\Newsletter\Newsletter;
use Symfony\Component\HttpFoundation\Response;

class SubscriberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.subscriber.index');
    }

    public function api()
    {

        $subscribers = SubscriberResource::collection(subscriber::latest()->get());
        return $subscribers;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ( ! Newsletter::isSubscribed($request->user_email) ) {
            Newsletter::subscribe($request->user_email);

            $subscriber= new subscriber;
            $subscriber->user_email = $request->user_email;

            $subscriber->save();

            return response('Thank you for subscribing to our newsletters',Response::HTTP_CREATED);
        }

        return response('You are already subscribed',Response::HTTP_CREATED);
    }

}
