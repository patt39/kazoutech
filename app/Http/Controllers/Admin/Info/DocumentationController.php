<?php

namespace App\Http\Controllers\Admin\info;

use App\Http\Resources\Info\DocumentationResource;
use App\Model\admin\info\documentation;
use App\Services\Admin\Info\DocumentationService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('admin.info.documentation.index');
    }

    public function api()
    {
        $documentations = Cache::rememberForever('documentations', function () {
            return DocumentationResource::collection(documentation::with('user')->latest()->get());
        });
        return $documentations;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('admin.info.documentation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return DocumentationResource|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|',
            //'name_doc' => 'required',
        ]);

        $documentation = new documentation();
        $documentation->name = $request->name;

        try{

            if ($request->name_doc) {
                $documentation->name_doc = $request->name_doc;            
                foreach ($request->name_doc as $file) {
                    if ($file->isValid()) {
                        $fileExtension = $file->getClientOriginalExtention();
                        $name = time() . str_random(5) . '.' .  $fileExtension;
                        Storage::disk('public')->put($name, $fileExtension);
                        $files[] = $name;
                    }
                }
            }
            

        }catch (\Illuminate\Database\QueryException $e) {
            Log::error($e);
        }

        $documentation->save();
        return redirect()->route('documentations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  documentation  $documentation
     * @return \Illuminate\Http\Response
     */
    public function edit(documentation $documentation)
    {
        $data = [
            'mode' => 'edit',
            'documentation' => $documentation,
        ];
        return view('admin.info.documentation.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, documentation $documentation)
    {

        $inputs = $request->all();
        try {

            if(isset($inputs['name_doc'])) {
                $file_logo = $inputs['name_doc'];
                Storage::disk('public')->delete($documentation->getUploadPath().$documentation->name_doc);
                $file_name_doc_name = ''.$file_logo->getClientOriginalName();
                Storage::disk('public')->putFileAs(
                    $documentation->getUploadPath(),
                    $file_logo,
                    $file_name_doc_name);
                $inputs['name_doc'] = $file_name_doc_name;
            }

            $documentation->update($inputs);

        } catch (\Illuminate\Database\QueryException $e){
            Log::error($e);
        }

        return redirect()->route('documentations.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $documentation = documentation::findOrFail($id);
       
        $documentation->delete();

        // try {
        //     Storage::disk('public')->delete($documentation->getUploadPath().$documentation->name_doc);
        //     // Delete user
        //     $documentation->delete();

        // } catch (\Illuminate\Database\QueryException $e) {
        //     Log::error($e);
        //     //dd($e);
        // }

        return ['message' => 'Document deleted'];
    }


    public function downloadDocumentation(documentation $documentation)
    {
        if ($documentation->name_doc)
        {
            $path = $documentation->getUploadPath();
            $file = Storage::disk('public');
            return $file->download($path.$documentation->name_doc);
        }
        return abort(404);
    }


    public function getFilelink(documentation $documentation)
    {
        if($documentation->name_doc)
        {
            $path = $documentation->getUploadPath($documentation->name_doc);
            $file = Storage::disk('public')->get($path);
            $response = \Response::make($file, 200);
            $response->header('Content-Type', 'application/pdf');
            return $response;
        }
        return abort(404);
    }


}
