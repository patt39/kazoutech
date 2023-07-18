<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Resources\Partial\TagResource;
use App\Model\user\tag;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TagController extends Controller
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
    public function index():View
    {
        return view('admin.partial.tag.index');
    }


    public function api()
    {
        $tags = TagResource::collection(tag::with('user')->orderBy('created_at','desc')->get());
        return $tags;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('admin.partial.tag.create');
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
        ]);

        $tag = new tag;
        $tag->title = $request->title;
        $tag->user_id = Auth::user()->id;

        $tag->save();


        return response('Created',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return TagResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = new TagResource(tag::where('id', $id)->findOrFail($id));
        return $tag;
    }

    public function getview($slug)
    {
        $tag = new TagResource(tag::where('slug',$slug)->firstOrFail());
        return $tag;
    }

    public function view(tag $tag)
    {
        return view('admin.partial.tag.view', [
            'tag' => $tag,
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
        $tag = tag::where('id', $id)->findOrFail($id);
        return view('admin.partial.tag.edit', compact('tag'));
    }


    public function disable($id)
    {
        DB::table('tags')
            ->where('id',$id)
            ->update([
                'status' => 0,
                'user_id' => auth()->user()->id,
            ]);

        return response('Disactivated',Response::HTTP_ACCEPTED);
    }

    public function active($id)
    {
        DB::table('tags')
            ->where('id',$id)
            ->update([
                'status' => 1,
                'user_id' => auth()->user()->id,
            ]);

        return response('Activated',Response::HTTP_ACCEPTED);
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
            'title'=> "required|string|min:2|max:25",
        ]);

        $tag = tag::findOrFail($id);

        $tag->title = $request->title;
        $tag->slug = null;
        $tag->user_id = Auth::user()->id;

        $tag->save();

        return ['message' => 'Tag updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = tag::findOrFail($id);
        $tag->delete();

        return ['message' => 'Tag deleted successfully'];
    }
}
