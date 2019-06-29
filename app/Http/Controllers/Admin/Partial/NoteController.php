<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Controllers\Controller;
use App\Http\Resources\Partial\NoteResource;
use App\Model\admin\note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class NoteController extends Controller
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
        return view('admin.partial.note.index');
    }

    public function api()
    {
        return NoteResource::collection(Note::with('user')
            ->orderBy('created_at','DESC')->paginate(6));
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
            'title'=>'required',
            'body'=>'required',
        ]);

        $note = new Note;
        $note->title = $request->title;
        $note->body = $request->body;
        $note->color_name = $request->color_name;
        $note->user_id = Auth::user()->id;

        $note->save();

        return response('Created',Response::HTTP_CREATED);
    }


    /**
     * cette parti consite a activer et a desactiver
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function disable($id)
    {
        DB::table('notes')
            ->where('id',$id)
            ->update([
                'status' => 1,
                'user_id' => auth()->user()->id,
            ]);
        return response('deactivated',Response::HTTP_ACCEPTED);

    }

    public function active($id)
    {
        DB::table('notes')
            ->where('id',$id)
            ->update([
                'status' => 0,
                'user_id' => auth()->user()->id,
            ]);

        return response('Activated',Response::HTTP_ACCEPTED);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\admin\note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\admin\note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\note  $note
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
        ]);
        $note = note::findOrFail($id);

        $note->title = $request->title;
        $note->body = $request->body;
        $note->color_name = $request->color_name;
        $note->user_id = Auth::user()->id;

        $note->save();

        return ['message' => 'note has ben updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\note  $note
     * @return array
     */

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return ['message' => 'note deleted '];
    }
}
