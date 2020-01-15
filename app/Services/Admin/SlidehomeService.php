<?php


namespace App\Services\Admin;


use Intervention\Image\Facades\Image;
use File;

class SlidehomeService
{


    public static function storeUploadImage($request,$slidehome)
    {

        if ($request->photo) {
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/slidehome/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            $destinationPath = public_path("assets/img/slidehome/{$name}");
            Image::make($request->photo)->save($destinationPath);
            //Save Image to database
            $myfilename = "/assets/img/slidehome/{$name}";
            $slidehome->photo = $myfilename;
        }

    }

    /**
     * Return the permission with the given id, or null if no product is found.
     *
     * @param int $id
     */
    public static function updateUploadeImage($request,$slidehome)
    {
        $currentPhoto = $slidehome->photo;

        if ($request->photo != $currentPhoto){
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/slidehome/';
            if(!file_exists($dir)){mkdir($dir, 0775, true);}
            Image::make($request->photo)->save(public_path('assets/img/slidehome/').$name);
            $request->merge(['photo' =>  "/assets/img/slidehome/{$name}"]);
            $oldFilename = $currentPhoto;
            File::delete(public_path($oldFilename));
        }
    }



}
