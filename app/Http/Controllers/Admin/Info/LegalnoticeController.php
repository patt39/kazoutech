<?php

namespace App\Http\Controllers\Admin\info;

use App\Http\Controllers\Controller;
use App\Http\Resources\Info\LegalnoticeResource;
use App\Model\admin\info\legalnotice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class LegalnoticeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        return view('admin.info.legal_notice.index');
    }

    public function api()
    {
        return LegalnoticeResource::collection(Legalnotice::with('user')->latest()->get());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.info.legal_notice.create');
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
            'body'=>'required',
        ]);

        $legalnotice = new Legalnotice;
        $legalnotice->body = $request->body;
        $legalnotice->user_id = auth()->user()->id;
        $legalnotice->status = '0';

        $legalnotice->save();

        return response('Created',Response::HTTP_CREATED);
    }

    /**
     * cette partie consite a activer et a desactiver
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function disable($id)
    {
        DB::table('legalnotices')
            ->where('id',$id)
            ->update([
                'status' => 0,
                'user_id' => auth()->user()->id,
            ]);
        return response('Disactivated',Response::HTTP_ACCEPTED);
    }

    public function active($id)
    {
        DB::table('legalnotices')
            ->where('id',$id)
            ->update([
                'status' => 1,
                'user_id' => auth()->user()->id,
            ]);

        return response('Activated',Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @return LegalnoticeResource|LegalnoticeResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $legalnotice = new LegalnoticeResource(legalnotice::where('id', $id)->findOrFail($id));
        return $legalnotice;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $legalnotice = legalnotice::where('id', $id)->findOrFail($id);
         return view('site.order.legalnotice.edit', compact('legalnotice'));

      }
    public function view($slug)
    {
        $legalnotice = new LegalnoticeResource(legalnotice::where('slug', $slug)->firstOrFail());
        return $legalnotice;
    }


    public function vector(legalnotice $legalnotice)
    {
        return view( 'site.order.legalnotice.view', [
            'legalnotice' => $legalnotice,
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\howtoregister  $howtoregister
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'body'=>'required',
        ]);
        $legalnotice = legalnotice::findOrFail($id);

        $legalnotice->body = $request->body;
        $legalnotice->user_id = auth()->user()->id;

        $legalnotice->save();

        return ['message' => 'updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\howtoregister  $howtoregister
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $legalnotice = Legalnotice::findOrFail($id);
        $legalnotice->delete();

        return ['message' => 'Deleted successfully '];
    }
}
