<?php

namespace App\Http\Controllers\Admin\info;

use Illuminate\Http\Request;
use App\Http\Resources\Info\CookieResource;
use App\Model\admin\info\cookie;
use App\Http\Controllers\Controller;

class CookieController extends Controller
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
        return view('admin.info.cookie.index');
    }
    
    public function api()
    {
        return CookieResource::collection(Cookie::with('user')->latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info.cookie.create');
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
            'color_name'=>'required',
            'title'=>'required',
            'body'=>'required',
        ]);

        $cookie = new Cookie;
        $cookie->title = $request->title;
        $cookie->body = $request->body;
        $cookie->color_name = $request->color_name;

        $cookie->save();

        return response('Created',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cookie = new CookieResource(cookie::where('id', $id)->findOrFail($id));
        return $cookie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $cookie = Cookie::where('id',$id)->firstOrfail($id);
       return view('admin.info.cookie.view', compact('cookie'));
    }

    public function view($slug)
    {
        $cookie = new CookieResource(cookie::where('slug',$slug)->firstOrFail());
        return $cookie;
    }



    public function vector(cookie $cookie)
    {
        return view('admin.info.cookie.view', [
            'cookie' => $cookie,
        ]);
    }

     /**
     * cette partie consite a activer et a desactiver
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function disable($id)
    {

        $cookie = cookie::where('id', $id)->findOrFail($id);
        $cookie->update([
            'status' => 0,
            'user_id' => auth()->user()->id,
        ]);
        return response('Deactivated', Response::HTTP_ACCEPTED);

    }

    public function active($id)
    {
        $cookie = cookie::where('id', $id)->findOrFail($id);
        $cookie->update([
            'status' => 1,
            'user_id' => auth()->user()->id,
        ]);
        return response('Activated', Response::HTTP_ACCEPTED);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'color_name'=>'required',
            'title'=>'required',
            'body'=>'required',
        ]);

        $cookie = cookie::findOrFail($id);

        $cookie->title = $request->title;
        $cookie->body = $request->body;
        $cookie->color_name = $request->color_name;
        $cookie->user_id = auth()->user()->id;

        $cookie->save();

        return ['message' => 'updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $cookie = cookie::findOrFail($id);
        $cookie->delete();

        return ['message' => 'Deleted successfully '];
    }
}
