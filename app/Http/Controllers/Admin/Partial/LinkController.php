<?php

namespace App\Http\Controllers\Admin\Partial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Partial\LinkResource;
use App\Model\admin\partial\link;

class LinkController extends Controller
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
        return view('admin.partial.link.index');
    }
     
    public function api()
    {
        return LinkResource::collection(Link::with('user')->latest()->get());
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
    public function store(LinkRequest $request)
    {
        $link = new Link;
        $link->link  =  $request->link;
        $link->slug  =  $request->slug;
        $link->name  =  $request->name;

        $link->save();

        return new LinkResource($link);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $link = link::findOrFail($id);
        return view('admin.partial.link.show', ['link' => $link]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = link::first($id);
        return view('admin.partial.link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinkRequest $request, Link $link)
    {
        $link->update($request->all());;

        return new LinkResource($link);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $link = link::findOrFail($id);
       $link -> delete();

       return ['message'=> 'Link Deleted'];
    }
}
