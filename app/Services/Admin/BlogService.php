<?php


namespace App\Services\Admin;


use Intervention\Image\Facades\Image;
use File;

class BlogService
{


    public static function storeUploadImage($request,$blog)
    {

        if ($request->photo) {
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/blog/';
            if(!file_exists($dir)){
                mkdir($dir, 0775, true);
            }
            $destinationPath = public_path("assets/img/blog/{$name}");
            Image::make($request->photo)->fit(800,600)->save($destinationPath);
            //Save Image to database
            $myfilename = "/assets/img/blog/{$name}";
            $blog->photo = $myfilename;
        }

    }

    /**
     * Return the permission with the given id, or null if no product is found.
     *
     * @param int $id
     */
    public static function updateUploadeImage($request,$blog)
    {
        $currentPhoto = $blog->photo;

        if ($request->photo != $currentPhoto){
            $namefile = sha1(date('YmdHis') . str_random(30));
            $name =   $namefile.'.' . explode('/',explode(':',substr($request->photo,0,strpos
                ($request->photo,';')))[1])[1];
            $dir = 'assets/img/blog/';
            if(!file_exists($dir)){mkdir($dir, 0775, true);}
            Image::make($request->photo)->fit(800,600)->save(public_path('assets/img/blog/').$name);
            $request->merge(['photo' =>  "/assets/img/blog/{$name}"]);
            $oldFilename = $currentPhoto;
            File::delete(public_path($oldFilename));
        }
    }



}
