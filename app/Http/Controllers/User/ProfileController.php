<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\user\ProfileResource;
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
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ProfileResource|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = new ProfileResource(profile::where('id', $id)->findOrFail($id));
        return $profile;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function statusOnline(profile $profile)
    {
        $profile->update(['status_online' => !$profile->status_online]);

        return response('Update',Response::HTTP_CREATED);
    }

}
