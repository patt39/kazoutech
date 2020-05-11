<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\AvischarbonneurRequest;
use App\Model\user\avischarbonneur;
use App\Model\user\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AvischarbonneurController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['apiavischarbonneurssite','avischarbonneursoffline']]);
    }


    public function apiavischarbonneurssite(User $user)
    {
        $avischarbonneurs = avischarbonneur::with('user')
            ->whereIn('user_id',[$user->id])
            ->orderBy('created_at','desc')
            ->paginate(6);
        return response()->json($avischarbonneurs,200);
    }

    public function avischarbonneursoffline(AvischarbonneurRequest $request,User $user)
    {
        $avischarbonneur = new avischarbonneur();
        $avischarbonneur->fill($request->all());

        $avischarbonneur->user_id = $user->id;
        $avischarbonneur->save();

        return response('Created', Response::HTTP_CREATED);

    }

    public function avischarbonneursonline(Request $request,User $user)
    {
        $this->validate($request,[
            'message'     => 'required|min:2|max:50000',
        ]);

        $avischarbonneur = new avischarbonneur();

        $avischarbonneur->first_name = $user->name;
        $avischarbonneur->email = $user->email;
        $avischarbonneur->user_id = $user->id;
        $avischarbonneur->message = $request->message;
        $avischarbonneur->save();

        return response('Created', Response::HTTP_CREATED);

    }


    public function destroy(Request $request, $id)
    {
        $avischarbonneur = avischarbonneur::findOrFail($id);
        try {
            // Delete user
            $avischarbonneur->delete();
            return ['message' => 'avis deleted '];
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e);
            return ['message' => "Error avis don't deleted"];
        }
    }
}
