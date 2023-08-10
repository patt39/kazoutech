<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Resources\Page\TestimonialResource;
use App\Model\admin\page\testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;
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
        $this->middleware('auth',['except' => ['api', 'apitestimonialmembers']]);
        // Middleware lock account
        //$this->middleware('auth.lock');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('admin.page.testimonial.index');
    }

    public function api()
    {
        return TestimonialResource::collection(testimonial::with('user')->orderBy('created_at','asc')->get());
    }

    public function apitestimonialmembers()
    {
        $testimonials = TestimonialResource::collection(testimonial::with('user') 
        ->where('status',1)->orderBy('created_at','asc')->get());
        return response()->json($testimonials, 200);
    }

    public function show($id)
    {
        $testimonial = new testimonialResource(testimonial::where('id',$id)->firstOrFail());
        return $testimonial;
    }

    public function create(): View
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
        $this->validate($request,[
            'body' => 'required',
            'role' => 'required|string|max:100',
        ]);

        $testimonial = new testimonial;

        $testimonial->body = $request->body;
        $testimonial->role = $request->role;

        $testimonial->save();

        return response('Created', Response::HTTP_CREATED);
    }

    /**
     * @param testimonial $testimonial
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(testimonial $testimonial, $id)
    {
        $testimonial = testimonial::where('id', $id)->findOrFail($id);
        $testimonial->update(['status' => !$testimonial->status]);

        return response('Update', Response::HTTP_ACCEPTED);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function vector($testimonial): View
    {
        return view('admin.page.testimonial.view', [
            'testimonial' => $testimonial,
        ]);
    }

    public function view($slug)
    {
        $testimonial = new testimonialResource(testimonial::where('slug',$slug)->firstOrFail());
        return $testimonial;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request, $id): JSONResponse
    {
        $this->validate($request,[
            'body' => 'required',
            'role' => 'required|string|max:100',
        ]);

        $testimonial = testimonial::findOrFail($id);

        $testimonial->body = $request->body;
        $testimonial->role = $request->role;
        $testimonial->slug = null;

        $testimonial->save();

        return JSONResponse(200, ['message' => 'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $testimonial = testimonial::findOrFail($id);

        $testimonial->delete();

        return Response(200, ['message' => 'Updated successfully']);
    }
}
