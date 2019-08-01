<?php

namespace App\Http\Controllers\Admin\Info;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Info\LegalnoticeResource;
use App\Model\admin\info\legalnotice;
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
        return view('admin.info.legalnotice.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info.legalnotice.create');
    }

    public function api()
    {
        return LegalnoticeResource::collection(Legalnotice::with('user')->latest()->get());
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
        return response('deactivated',Response::HTTP_ACCEPTED);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $legalnotice = new LegalnoticeResource(legalnotice::where('id', $id)->findOrFail($id));
        return $legalnotice;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $legalnotice = Legalnotice::where('id',$id)->first();
        return view('admin.info.legalnotice.edit', compact('legalnotice'));
    }

    
    public function view($slug)
    {
        $legalnotice = new LegalnoticeResource(legalnotice::where('slug', $slug)->first());
        return $legalnotice;
    }


    public function vector(legalnotice $legalnotice)
    {
        return view( 'admin.info.legalnotice.view', [
            'legalnotice' => $legalnotice,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $legalnotice = Legalnotice::findOrfail($id);
       $legalnotice -> delete();

       return ['message' => 'Legalnotice deleted'];
    }
}
