<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\user\ProfileResource;
use App\Http\Resources\UserResource;
use App\Model\user\profile;
use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\User\Profile\UpdateprofileRequest;

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
                ->with(['Error' => 403, "Unauthorized editing this is not your account."]);
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

    public function profileEdit()
    {
        $user = auth()->user();

        return view("user.profile.profileEdit")->withUser($user);
    }


    public function devenir_charbonneur_update_register(UpdateprofileRequest $request, User $profileUser) {

        $profileUser = auth()->user();

        $currentAvatar = $profileUser->avatar;
        $currentCniPicture = $profileUser->cni_picture;

        // Update Avatar Profile
        if ($request->avatar != $currentAvatar){

            $namefile = sha1(date('YmdHis') . str_random(30));

            $name =   $namefile.'.' . explode('/',explode(':',substr($request->avatar,0,strpos
                ($request->avatar,';')))[1])[1];

            $dir = 'assets/img/avatars/user';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            Image::make($request->avatar)->save(public_path($dir).$name);

            $request->merge(['avatar' =>  "/assets/img/avatars/user/{$name}"]);

            // Ici on supprime l'avatar existant
            $oldFilename = $currentAvatar;
            File::delete(public_path($oldFilename));
        }

        // Update Cni Profile
        if ($request->cni_picture != $currentCniPicture){

            $namefile = sha1(date('YmdHis') . str_random(30));

            $name =   $namefile.'.' . explode('/',explode(':',substr($request->avatar,0,strpos
                ($request->avatar,';')))[1])[1];

            $dir = 'assets/img/cni';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            Image::make($request->cni_picture)->save(public_path($dir).$name);

            $request->merge(['cni_picture' =>  "/assets/img/cni/{$name}"]);

            // Ici on supprime la cni existante
            $oldFilename = $currentCniPicture;
            File::delete(public_path($oldFilename));
        }

        $profileUser->update($request->all());

        return ['message' => 'updated successfully'];
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
