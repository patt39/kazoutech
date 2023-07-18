<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\FaqOccupationResource;
use App\Model\admin\faqoccupation;
use App\Model\admin\occupation;
use Illuminate\View\View;
use App\Http\Requests\Admin\FaqOccupation\StoreRequest;
use App\Http\Requests\Admin\FaqOccupation\UpdateRequest;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;


class FaqOccupationController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','apioccupationfaqs']]);
    }

    public function api()
    {
        $faqs = FaqOccupationResource::collection(faqoccupation::with('user','occupation')->latest()
        ->distinct()->get());
        
        return response()->json($faqs,200);
    }

    public function apioccupationfaqs(occupation $occupation)
    {
        $faqs = occupation::whereSlug($occupation->slug)->with('user')
        ->with([
            'faqoccupations' => function ($q) use ($occupation){
                $q->with('user','occupation')
                    ->whereIn('occupation_id',[$occupation->id])
                    ->orderBy('created_at','DESC')->distinct()->get()->toArray();},
        ])->firstOrFail();
        return response()->json($faqs,200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('admin.faq.faqoccupation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('admin.faq.faqoccupation.create');

    }

    public function occupationfaq(occupation $occupation)
    {
        $occupationfaqs = occupation::whereSlug($occupation->slug)->firstOrFail();

        return view('admin.faq.faqoccupation.index',compact('occupationfaqs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $faqoccupation = new faqoccupation;

        $faqoccupation->title = $request->title;
        $faqoccupation->body = $request->body;
        $faqoccupation->occupation_id = $request->occupation_id;

        $faqoccupation->save();

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

        $faqoccupation = new FaqOccupationResource(faqoccupation::where('id', $id)->findOrFail($id));
        
        return response()->json($faqoccupation,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faqoccupation = faqoccupation::where('id',$id)->findOrFail($id);

        return view('admin.faq.faqoccupation.edit', compact('faqoccupation'));
    }

    public function status($id)
    {
        $faqoccupation = faqoccupation::findOrFail($id);
        $faqoccupation->update(['status' => !$faqoccupation->status]);

        return response()->json($faqoccupation,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,  $id)
    {
        $faqoccupation = faqoccupation::findOrFail($id);

        $faqoccupation->update($request->all());;

        return ['message' => 'Updated successfully'];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqoccupation = faqoccupation::findOrFail($id);

        $faqoccupation->delete();

        return ['message' => 'FAQ deleted ']; 
    }
}
