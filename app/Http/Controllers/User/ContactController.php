<?php

namespace App\Http\Controllers\User;


use App\Http\Requests\Admin\Contacts\StorePostRequest;
use App\Http\Resources\User\ContactResource;
use App\Model\admin\contact;
use App\Rules\Recaptcha;
use App\Services\MailContactService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','store','contatPage','apibookmark']]);
    }

    /**
     *Get page contact user site
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function contatPage()
    {
        return view('user.contact.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contact.index');
    }

    public function bookmaksindex()
    {
        return view('admin.contact.index');
    }


    public function api()
    {
        $contacts = ContactResource::collection(contact::where('bookmark', 0)
            ->orderBy('created_at','desc')
            ->paginate(10));
        return response()->json($contacts,200);
    }

    public function apibookmark()
    {
        $contacts = Cache::rememberForever('contacts', function () {
            return ContactResource::collection(contact::where('bookmark', 1)->orderBy('created_at','desc')->get());
        });
        return $contacts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Recaptcha $recaptcha
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StorePostRequest $request,Recaptcha $recaptcha)
    {

        $contact = new contact;
        $slug = sha1(date('YmdHis') . str_random(30));
        $contact->fill($request->all());

        $contact->slug = $slug;
        $contact->save();


        MailContactService::newMailContact($request);

        return response('Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ContactResource|\Illuminate\Http\Response
     */
    //public function show($slug)
    //{
    //    $contact = new ContactResource(contact::where('slug', $slug)->findOrFail($slug));
    //    return $contact;
    //}


    public function view($slug)
    {
        $contact = new ContactResource(contact::where('slug',$slug)->firstOrFail());
        return $contact;
    }


    public function contact(contact $contact)
    {
        return view('admin.contact.view', [
            'contact' => $contact,
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
     * cette parti consite a activer et a desactiver
     * @param $slug
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function disable(contact $contact, $id)
    {
        $contact = contact::where('id', $id)->findOrFail($id);
        $contact->update([
            'status' => 1,
            'user_id' => auth()->user()->id,
        ]);
        return response('Disabled message',Response::HTTP_ACCEPTED);
    }

    public function bookmark(contact $contact, $id)
    {
        $contact = contact::where('id', $id)->findOrFail($id);
        $contact->update([
            'bookmark' => 1,
            'user_id' => auth()->user()->id,
        ]);
        return response('Message bookmarked',Response::HTTP_ACCEPTED);
    }

    public function unbookmark(contact $contact, $id)
    {
        $contact = contact::where('id', $id)->findOrFail($id);
        $contact->update([
            'bookmark' => 0,
            'user_id' => auth()->user()->id,
        ]);
        return response('Message unbookmark',Response::HTTP_ACCEPTED);
    }

    public function active(contact $contact, $id)
    {
        $contact = contact::where('id', $id)->findOrFail($id);
        $contact->update([
            'status' => 0,
            'user_id' => auth()->user()->id,
        ]);
        return response('Activated',Response::HTTP_ACCEPTED);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $contact = contact::findOrFail($id);
        try {
            // Delete contact message
            $contact->delete();
            return ['message' => 'contact message deleted '];
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e);
            return ['message' => "Error contact message undeleted"];
        }
    }

}
