<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\FaqResource;
use App\Model\admin\faq;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class FaqController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api']]);
        // Middleware lock account
        //$this->middleware('auth.lock');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.faq.index');
    }

    public function api()
    {
        $faqs = Cache::rememberForever('faqs', function () {
            return FaqResource::collection(Faq::with('user','categoryfaq')->latest()->get());
        });
        return $faqs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'categoryfaq_id'=>'required',
        ]);

        $faq = new faq;
        $faq->title = $request->title;
        $faq->body = $request->body;
        $faq->categoryfaq_id = $request->categoryfaq_id;

        $faq->save();

        return response('Created',Response::HTTP_CREATED);
    }
    
    /**
     * cette partie consite a activer et a desactiver
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function disable(faq $faq, $id)
    {
        $faq = faq::where('id', $id)->findOrFail($id);
        $faq->update([
            'status' => 0,
        ]);
        return response('Deactivated',Response::HTTP_ACCEPTED);
    }

    public function active(faq $faq, $id)
    {
        $faq = faq::where('id', $id)->findOrFail($id);
        $faq->update([
            'status' => 1,
        ]);
        return response('Activated',Response::HTTP_ACCEPTED);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return FaqResource|\Illuminate\Http\Response
     */
    //public function show($id)
    //{
    //    //$faq = new FaqResource(faq::where('id',$id)->findOrFail($id));
    //    return new FaqResource(faq::where('id', $id)->findOrFail($id));
    //    //return ($faq);
    //}

    public function show($id)
    {
        $faq = new FaqResource(faq::where('id', $id)->findOrFail($id));
        return $faq;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function view(faq $faq)
    {
        //conter les visiteurs sur le site
        //$faq->visits()->increment();

        return view('admin.faq.view', [
            'faq' => $faq,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = faq::where('id',$id)->findOrFail($id);

        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'categoryfaq_id'=>'required',
        ]);

        $faq = faq::findOrFail($id);

        $faq->title = $request->title;
        $faq->body = $request->body;
        $faq->categoryfaq_id = $request->categoryfaq_id;

        $faq->save();

        return ['message' => 'updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return ['message' => 'Deleted successfully '];
    }
}
