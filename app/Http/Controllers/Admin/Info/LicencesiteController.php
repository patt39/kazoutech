<?php

namespace App\Http\Controllers\Admin\Info;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Info\LicencesiteResource;
use App\Model\admin\info\licencesite;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class LicencesiteController extends Controller
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
        return view('admin.info.licence.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info.licence.create');
    }
 
    public function api()
    {
        return LicencesiteResource::collection(Licence::with('user')->latest()->get());
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
            'body'=>'required|string'
        ]);
        
        $licence = new licence;
        $licence->body = $request->body;
        $licence->user_id = auth()->user()->id;
        $licence->status = '0';
        
        $licence->save();
        
        return response('Created',Response::HTTP_CREATED);
    }
    
    
    /**
     * cette partie consite a activer et a desactiver
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function disable($id)
    {
        DB::table('licences')
            ->where('id',$id)
            ->update([
                'status' => 0,
                'user_id' => auth()->user()->id,
            ]);
        return response('deactivated',Response::HTTP_ACCEPTED);
    }

    public function active($id)
    {
        DB::table('licences')
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
        $licence = new LicenceResource(licence::where('id', $id)->findOrFail($id));
        return $licence;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $licencesite = Licencesite::where('id',$id)->first();
        return view('admin.info.licence.edit', compact('licencesite'));
    }

    public function view($slug)
    {
        $licence = new LicenceResource(licence::where('slug',$slug)->firstOrFail());
        return $licence;
    }



    public function vector(licence $licence)
    {
        return view('admin.info.licence.view', [
            'licence' => $licence,
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
            'body'=>'required|string'
        ]);
        $licence = licence::first();

        $licence->body = $request->body;
        $licence->user_id = auth()->user()->id;

        $licence->save();

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
        $licencesite = Licencesite::findOrfail($id);
        $licencesite -> delete();

        return ['message' => 'licence deleted'];
    }
}
