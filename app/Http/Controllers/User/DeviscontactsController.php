<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\ContactdevisRequest;
use App\Http\Resources\DeviscontactResource;
use App\Model\admin\occupation;
use App\Model\user\deviscontact;
use App\Services\Admin\MailDeviscontactService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DeviscontactsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','deviscontacts']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.deviscontact.index');
    }

    public function api()
    {
        $deviscontacts = DeviscontactResource::collection(deviscontact::with('occupation','city')
            ->orderBy('created_at','desc')
            ->paginate(10));
        return response()->json($deviscontacts,200);
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
    public function deviscontacts(ContactdevisRequest $request,occupation $occupation)
    {
        $deviscontact = new deviscontact;
        $deviscontact->fill($request->all());

        $deviscontact->occupation_id = $occupation->id;
        $deviscontact->save();


        MailDeviscontactService::newMailDeviscontact($request);

        return response('Created', Response::HTTP_CREATED);

    }


    public function view($slug)
    {
        $deviscontact = new DeviscontactResource(deviscontact::where('slug',$slug)->firstOrFail());

        return response()->json($deviscontact,200);
    }


    public function contact(deviscontact $deviscontact)
    {
        return view('admin.deviscontact.view', [
            'deviscontact' => $deviscontact,
        ]);
    }

    public function disable(deviscontact $contact, $id)
    {
        $deviscontact = deviscontact::where('id', $id)->findOrFail($id);
        $deviscontact->update([
            'status' => 0,
        ]);
        return response('Deactivated message read',Response::HTTP_ACCEPTED);
    }

    public function active(deviscontact $contact, $id)
    {
        $deviscontact = deviscontact::where('id', $id)->findOrFail($id);
        $deviscontact->update([
            'status' => 1,
        ]);
        return response('Activated',Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $deviscontact = deviscontact::findOrFail($id);
        try {
            // Delete user
            $deviscontact->delete();
            return ['message' => 'message contact deleted '];
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e);
            return ['message' => "Error message contact don't deleted"];
        }
    }
}
