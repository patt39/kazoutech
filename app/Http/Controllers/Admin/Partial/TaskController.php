<?php

namespace App\Http\Controllers\Admin\Partial;

use App\Http\Resources\Partial\TaskResource;
use App\Model\admin\task;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.partial.task.index');
    }

    public function api()
    {
        $tasks = TaskResource::collection(Task::with('user','administrator','note')
                ->orderBy('created_at','DESC')->paginate(6));
        return $tasks;
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

    public function search($field, $query)
    {
        //$colors = new ColorCollection(Color::with('user')->latest()->get());
        $colors = TaskResource::collection(Task::where($field,'LIKE',"%$query%")
            ->with('user')->latest()->get());
        return $colors;
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
            'administrator_id'=>'required',
            'note_id'=>'required',
        ]);

        $task = new Task;
        $task->administrator_id = $request->administrator_id;
        $task->note_id = $request->note_id;

        $task->save();

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
        //
    }

    public function view($username)
    {
        if($username) {
            $user = User::where('username', $username)->firstOrFail();
        } else {
            $user = User::findOrFail(auth()->user()->id);
        }
        $usertasks = $user->tasks()->latest()->get();
        return view("admin.partial.task.view",compact('usertasks'))->withUser($user);
    }

    public function usertask($username)
    {
        if($username) {
            $user = User::where('username', $username)->firstOrFail();
        } else {
            $user = User::findOrFail(auth()->user()->id);
        }
        $usertasks = TaskResource::collection($user->tasks()
            ->orderBy('updated_at','DESC')->paginate(6));
        return $usertasks;
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

    public function updateProgress(Request $request, $id)
    {
        $this->validate($request,[
            'progress'=> "nullable|integer|min:1|max:100|digits_between: 1,9",
        ]);

        $task = task::findOrFail($id);
        $task->progress = $request->progress;

        $task->save();

        return response('Progress Task update', Response::HTTP_ACCEPTED);
    }


    public function updateDescription(Request $request, $id)
    {
        $this->validate($request,[
            'description'=> 'required',
        ]);

        $task = task::findOrFail($id);
        $task->description = $request->description;

        $task->save();

        return response('Description Task update', Response::HTTP_ACCEPTED);
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
        $task = Task::findOrFail($id);
        $task->delete();

        return ['message' => 'note deleted '];
    }
}
