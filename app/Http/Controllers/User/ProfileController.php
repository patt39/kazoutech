<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\user\ProfileResource;
use App\Http\Resources\UserResource;
use App\Model\user\profile;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['view','profileView']]);
    }


    public function profileUser()
    {
        return view('user.profile.profileUserIndex');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $profile = new ProfileResource(profile::where('id', $id)->findOrFail($id));

        return response()->json($profile,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(profile $profile)
    {
        if (auth()->user()->id === $profile->user_id){

            $this->authorize('update',$profile);

            return view("admin.account.profileEdit",[
                'profile' => $profile,
            ]);
        }else{
            return back()
                ->with('error',"Unauthorized edit this article contact Author.");
        }


    }

    public function view(user $user)
    {
        $user = User::where('username', $user->username)->with('city','occupation','profile')
            ->withCount(['annonces' => function ($q) use ($user){
                $q->where('status',1)->with('city','user','occupation','categoryoccupation')
                    ->whereIn('user_id',[$user->id])
                    ->whereHas('city', function ($q) {$q->where('status',1);})
                    ->whereHas('categoryoccupation', function ($q) {$q->where('status',1);})
                    ->whereHas('occupation', function ($q) {$q->where('status',1);});
            }])->with(['annonces' => function ($q) use ($user){
                $q->where('status',1)->with('city','user','occupation','categoryoccupation')
                    ->whereIn('user_id',[$user->id])
                    ->whereHas('city', function ($q) {$q->where('status',1);})
                    ->whereHas('categoryoccupation', function ($q) {$q->where('status',1);})
                    ->whereHas('occupation', function ($q) {$q->where('status',1);});
            }])->firstOrFail();


        return response()->json($user,200);
    }

    public function profileView($username)
    {
        if($username) {
            $user = User::where('username', $username)->firstOrFail();
        } else {
            $user = User::findOrFail(auth()->user()->id);
        }
        return view("user.profile.profileIndex")->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            //"sex" => "required|in:Female,Male",
        ]);

        $profile = profile::findOrFail($id);

        $this->authorize('update',$profile);

        if(auth()->user()->id === $profile->user_id) {
            $profile->update($request->all());
            return ['message' => 'profile has been updated'];
        }else{
            return back()
                ->with('error',"Unauthorized edit this article contact Author.");
        }
    }

    /**
     * @param profile $profile
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function statusOnline(profile $profile)
    {
        $profile->update(['status_online' => !$profile->status_online]);

        return response('Update',Response::HTTP_CREATED);
    }

}
