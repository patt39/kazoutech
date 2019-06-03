<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\ContactFormRequest;
use App\Http\Resources\User\ContactResource;
use App\Model\admin\contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        $this->middleware('auth',['except' => ['api','store']]);
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


    public function api()
    {
        return ContactResource::collection(contact::orderBy('created_at','desc')->get());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        //dd(\request()->all());
        $contact = new Contact;

        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();

        Mail::send('emails.contact',
            array(
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'subject' => $request->get('subject'),
                'email' => $request->get('email'),
                'message' => $request->get('message')
            ),
            function ($message) {
                $message->from('temgoua2013@yahoo.fr');
                $message->to('dasgivemoi@gmail.com', 'kazoucoin')
                    ->subject('New Message send from contact page');
            });

        return response('Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ContactResource|\Illuminate\Http\Response
     */
    public function show($slug)
    {
        $contact = new ContactResource(contact::where('slug', $slug)->findOrFail($slug));
        return $contact;
    }


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
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function disable($id)
    {
        DB::table('contacts')
            ->where('id',$id)
            ->update([
                'status' => 1,
                'user_id' => auth()->user()->id,
            ]);
        return response('deactivated message read',Response::HTTP_ACCEPTED);
    }

    public function active($id)
    {
        DB::table('contacts')
            ->where('id',$id)
            ->update([
                'status' => 0,
                'user_id' => auth()->user()->id,
            ]);

        return response('Message read',Response::HTTP_ACCEPTED);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = contact::findOrFail($id);
        $contact->delete();

        return ['message' => 'message contact deleted '];
    }
}
