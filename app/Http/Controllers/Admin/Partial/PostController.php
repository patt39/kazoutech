<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Resources\Partial\PostResource;
use App\Model\admin\partial\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;


class PostController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.partial.posts.index');
    }

    public function api()
    {
        $posts = PostResource::collection(post::with('user')->latest()->get());
        return $posts;
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
        $this->validate($request,[
            'name'=>'required|unique:posts',
        ]);

        $post = new post;
        $post->name = $request->name;


        $post->save();


        return response('Created',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * cette parti consite a donner la permission a l'administrateur d'activer et a desactiver le post
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function admindisable(post $post,$id)
    {
        $post = post::where('id', $id)->findOrFail($id);
            $post->update([
                'status_admin' => 0,
            ]);
        return response('deactivated', Response::HTTP_ACCEPTED);

    }

    public function adminactive($id)
    {
        DB::table('posts')
            ->where('id',$id)
            ->update([
                'status_admin' => 1,
            ]);

        return response('Activated', Response::HTTP_ACCEPTED);

    }

    /**
     * Cette partie consite a donner la permission a l'utilisatue d'activer et a desactiver son post
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function userdisable($id)
    {
        $post = post::where('id', $id)->findOrFail($id);
        if(Auth::user()->id === $post->user_id){

            DB::table('posts')
                ->where('id',$id)
                ->update([
                    'status_user' => 0,
                    'user_id' => auth()->user()->id,
                ]);
            return response('deactivated', Response::HTTP_ACCEPTED);
        }
        return response('Error disable', Response::HTTP_ACCEPTED);

    }

    public function useractive($id)
    {

        $post = post::where('id', $id)->findOrFail($id);
        if(Auth::user()->id === $post->user_id){

            DB::table('posts')
                ->where('id',$id)
                ->update([
                    'status_user' => 1,
                    'user_id' => auth()->user()->id,
                ]);
            return response('Activated', Response::HTTP_ACCEPTED);
        }
        return response('Error activated', Response::HTTP_ACCEPTED);

    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = post::findOrFail($id);
        $post->update($request->all());
       
        return ['message' => 'Post Updated successfully '];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = post::findOrFail($id);
        $post->delete();

        return ['message' => 'Deleted successfully '];
    }
}
