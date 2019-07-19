<?php

namespace App\Http\Controllers\Admin\Partial;



use App\Http\Resources\Partial\ActivitylogResource;
use App\Model\admin\partial\activitylog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivitylogController extends Controller
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
        return view('admin.partial.activity_log.index');
    }

    public function api()
    {
        return ActivitylogResource::collection(activitylog::with('user')->latest()->get());
    }
}
