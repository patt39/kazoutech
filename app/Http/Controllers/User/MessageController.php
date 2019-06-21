<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\User\MessageResource;
use App\Model\user\message;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Searchable\Search;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
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
        return view('admin.message.index');
    }

    public function send()
    {
        return view('admin.message.send');
    }



    public function api()
    {
        return MessageResource::collection(message::with('from','to')->orderBy('created_at','desc')->get());
    }


    public function user(Request $request)
    {

        //if ($search = $request->get('q')){

        //    $users = UserResource::collection(User::where(function ($query) use ($search){
        //        $query->where('username','LIKE',"%$search%")
        //               ->orWhere('email','LIKE',"%$search%");
        //    })->get());
        //}else{

        //    //$users = UserResource::collection(User::orderBy('created_at','DESC')->get());
        //}


        $users = (new Search())
            ->registerModel(User::class, ['name', 'username','email'])
            ->search($request->input('query'));

        return response()->json($users);


        //return UserResource::collection(User::orderBy('created_at','DESC')->get());
    }

    /**
     * cette parti consite a activer et a desactiver
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function disable($slug)
    {
        DB::table('messages')
            ->where('slug',$slug)
            ->update([
                'status' => 1,
            ]);
        return response('deactivated message read',Response::HTTP_ACCEPTED);
    }

    public function active($id)
    {
        DB::table('messages')
            ->where('id',$id)
            ->update([
                'status' => 0,
            ]);

        return response('Message read',Response::HTTP_ACCEPTED);
    }



    public function view($slug)
    {
        $message = new MessageResource(message::where('slug',$slug)->firstOrFail());
        return $message;
    }


    public function message(message $message)
    {
        return view('admin.message.view', [
            'message' => $message,
        ]);
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
            'object'=>'required',
            'to_id'=>'required',
        ]);

        $message = new message;
        $message->object = $request->object;
        $message->message = $request->message;
        $message->to_id = $request->to_id;
        $message->from_id = Auth::user()->id;

        $message->save();


        return response('Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = message::findOrFail($id);
        $message->delete();

        return ['message' => 'message deleted '];
    }
}
