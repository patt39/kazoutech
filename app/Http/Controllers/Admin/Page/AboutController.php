<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Resources\Page\AboutResource;
use App\Model\admin\page\about;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['api','aboutmember']]);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('admin.page.about.index');
    }

    public function api()
    {
        $abouts = Cache::rememberForever('abouts', function () {
            return AboutResource::collection(about::with('user')->latest()->get());
        });
        return $abouts;
    }

    public function aboutmember()
    {
        $abouts = AboutResource::collection(about::with('user')
            ->where('status',1)->orderBy('created_at','asc')->get());

        return response()->json($abouts,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('admin.page.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(\request()->all()); // pour tester les données qui entrent dans la base de données
        // $this->validate($request, [
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'description' => 'required',
        //     'role' => 'required',
        //     'photo' => 'required',
        // ]);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'description' => 'required',
            'role' => 'required',
            'photo' => 'required',
        ]);

        $about = new About;

        $about->fblink = $request->fblink;
        $about->twlink = $request->twlink;
        $about->instlink = $request->instlink;
        $about->last_name = $request->last_name;
        $about->role = $request->role;
        $about->first_name = $request->first_name;
        $about->description = $request->description;

       if ($request->photo) {

            $namefile = sha1(date('YmdHis') . str_random(30));

            $name = $namefile. '.' . explode('/', explode(':', substr($request->photo, 0, strpos
                ($request->photo, ';')))[1])[1];

            $dir = 'assets/img/about/';
            if (!file_exists($dir)) {
                mkdir($dir, 0775, true);
            }
            $destinationPath = public_path("assets/img/about/{$name}");
            Image::make($request->photo)->fit(400,400)->save($destinationPath);

            //Save Image to database
            $myfilename = "/assets/img/about/{$name}";
            $about->photo = $myfilename;
        }
        $about->save();

        return response('Created', Response::HTTP_CREATED);
    }

    /**
     * @param about $about
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(about $about)
    {
        $about->update(['status' => !$about->status]);

        return response()->json($about);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return AboutResource|\Illuminate\Http\Response
     */
    public function show(string $id, about $bout)
    {
        $about = new AboutResource(about::where('id', $id)->findOrFail($id));
        return $about;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id, about $about): View
    {
        $about = about::where('id', $id)->findOrFail($id);
        return view('admin.page.about.edit', compact('about'));
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
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'description' => 'required',
            'role' => 'required',
            'photo' => 'required',
        ]);

        $about = about::findOrFail($id);
        $about->slug = null;
        $currentPhoto = $about->photo;

        if ($request->photo != $currentPhoto){

            $namefile = sha1(date('YmdHis') . str_random(30));

            $name = $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];

            $dir = 'assets/img/about/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            Image::make($request->photo)->fit(400,400)->save(public_path('assets/img/about/').$name);

            $request->merge(['photo' =>  "/assets/img/about/{$name}"]);

            // Ici on suprime l'image existante
            $oldFilename = $currentPhoto;
            File::delete(public_path($oldFilename));
        }

        $about->update($request->all());

        return ['message' => 'Updated successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $about = about::findOrFail($id);
        $oldFilename = $about->photo;
        File::delete(public_path($oldFilename));

        $about->delete();

        return ['message' => 'Deleted successfully'];
    }
}
