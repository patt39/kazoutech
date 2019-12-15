<?php


namespace App\Services\Admin;


use Intervention\Image\Facades\Image;
use File;

class OccupationService
{


    public static function storeUploadImage($request,$occupation)
    {

        if ($request->photo) {
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/occupations/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            $destinationPath = public_path("assets/img/occupations/{$name}");
            Image::make($request->photo)->save($destinationPath);
            //Save Image to database
            $myfilename = "/assets/img/occupations/{$name}";
            $occupation->photo = $myfilename;
        }

    }


    public static function updateUploadeImage($request,$occupation)
    {
        $currentPhoto = $occupation->photo;

        if ($request->photo != $currentPhoto){
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/occupations/';
            if(!file_exists($dir)){mkdir($dir, 0775, true);}
            Image::make($request->photo)->save(public_path('assets/img/occupations/').$name);
            $request->merge(['photo' =>  "/assets/img/occupations/{$name}"]);
            $oldFilename = $currentPhoto;
            File::delete(public_path($oldFilename));
        }
    }

}
