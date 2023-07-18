<?php

namespace App\Http\Controllers\Admin\Partial\Settings;

use App\Events\ColorPublishedEvent;
use App\Http\Requests\Admin\Colors\StoreRequest;
use App\Http\Requests\Admin\Colors\UpdateRequest;
use App\Http\Resources\AuditResource;
use App\Http\Resources\Partial\ColorResource;
use App\Model\admin\audit;
use App\Model\admin\color;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Torann\GeoIP\Console\Update;

class ColorController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','apiauditing']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        //$trash = color::onlyTrashed()->get();
        return view('admin.partial.color.index');
    }

    public function api()
    {
        $colors = ColorResource::collection(Color::with('user')->latest()->get());
        return response()->json($colors,200);
    }

    public function apiauditing($color)
    {
        $colors = AuditResource::collection(color::whereSlug($color)->firstOrFail()->auditings()
            ->latest()->get());
        return $colors;
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

    public function store(StoreRequest $request)
    {

       $color = new Color;
       $color->name = $request->name;
       $color->color_name = $request->color_name;

       $color->save();

       return response('Created',Response::HTTP_CREATED);
    }

    public function disable(color $color, $id)
    {
        $color = color::where('id', $id)->findOrFail($id);
        $color->update([
            'status' => 0,
        ]);
        return response('Disactivated',Response::HTTP_ACCEPTED);
    }


    public function active(color $color, $id)
    {
        $color = color::where('id', $id)->findOrFail($id);
        $color->update([
            'status' => 1,
        ]);
        return response('Activated',Response::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $color = color::findOrFail($id);

        return view('admin.partial.color.show', compact('color'));
    }

    public function auditing($color)
    {
        $colors = color::whereSlug($color)->firstOrFail()->auditings()
            ->with('user')->orderBy('created_at','DESC')->get();
        return view('admin.partial.color.index',compact('colors'));
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
     * @return array
     */
    public function update(UpdateRequest $request,$id)
    {
        $color = color::findOrFail($id);

        $color->color_name = $request->color_name;
        $color->name = $request->name;
        

        $color->save();

        return ['message' => 'Color has been updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        $color = color::findOrFail($id);
        $color->delete();

        return ['message' => 'Color deleted '];
    }
}
