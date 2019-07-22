<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Resources\Page\TestimonialResource;
use App\Model\admin\page\testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestimonialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api']]);
        // Middleware lock account
        //$this->middleware('auth.lock');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.testimonial.index');
    }

    public function api()
    {
        return TestimonialResource::collection(Testimonial::with('user')->latest()->get());
    }

    public function show($id)
    {
        $testimonial = new TestimonialResource(testimonial::where('id',$id)->firstOrFail());
        return $testimonial;
    }

    public function create()
    {
        return view('admin.page.testimonial.create');
    }

    public function edit($id)
    {
        $testimonial = testimonial::where('id', $id)->findOrFail($id);
        return view('admin.page.testimonial.edit', compact('testimonial'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(\request()->all()); // pour tester les donner qui entre dans la base de donner
        $this->validate($request,[
            'body' => 'required',
            'role' => 'required|string|max:100',
        ]);

        $testimonial = new Testimonial;

        $testimonial->body = $request->body;
        $testimonial->role = $request->role;

        $testimonial->save();

        return response('Created', Response::HTTP_CREATED);
    }




    public function disable(testimonial $testimonial,$id)
    {
        $testimonial = testimonial::where('id', $id)->findOrFail($id);
        $testimonial->update([
            'status' => 0,
        ]);
        return response('deactivated', Response::HTTP_ACCEPTED);
    }

    public function active(testimonial $testimonial,$id)
    {
        $testimonial = testimonial::where('id', $id)->findOrFail($id);
        $testimonial->update([
            'status' => 1,
        ]);
        return response('activated', Response::HTTP_ACCEPTED);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function vector(testimonial $testimonial)
    {
        return view('admin.page.testimonial.view', [
            'testimonial' => $testimonial,
        ]);
    }

    public function view($slug)
    {
        $testimonial = new TestimonialResource(testimonial::where('slug',$slug)->firstOrFail());
        return $testimonial;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'body' => 'required',
            'role' => 'required|string|max:100',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        $testimonial->body = $request->body;
        $testimonial->role = $request->role;

        $testimonial->save();

        return ['message' => 'updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->delete();

        return ['message' => 'Deleted successfully'];
    }
}
