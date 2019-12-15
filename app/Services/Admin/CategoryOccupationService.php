<?php


namespace App\Services\Admin;


use Intervention\Image\Facades\Image;
use File;

class CategoryOccupationService
{


    public static function storeUploadImage($request,$categoryoccupation)
    {

        if ($request->photo) {
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/categoryoccupation/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            $destinationPath = public_path("assets/img/categoryoccupation/{$name}");
            Image::make($request->photo)->save($destinationPath);
            //Save Image to database
            $myfilename = "/assets/img/categoryoccupation/{$name}";
            $categoryoccupation->photo = $myfilename;
        }

    }

    /**
     * Return the permission with the given id, or null if no product is found.
     *
     * @param int $id
     */
    public static function updateUploadeImage($request,$categoryoccupation)
    {
        $currentPhoto = $categoryoccupation->photo;

        if ($request->photo != $currentPhoto){
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/categoryoccupations/';
            if(!file_exists($dir)){mkdir($dir, 0775, true);}
            Image::make($request->photo)->save(public_path('assets/img/categoryoccupations/').$name);
            $request->merge(['photo' =>  "/assets/img/categoryoccupations/{$name}"]);
            $oldFilename = $currentPhoto;
            File::delete(public_path($oldFilename));
        }
    }



}
