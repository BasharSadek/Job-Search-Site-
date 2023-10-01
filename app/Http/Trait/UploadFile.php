<?php

namespace App\Http\Trait;

use \Illuminate\Support\Str;

trait UploadFile
{
    public function upload($file, $folder)
    {
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path($folder), $filename);
        return strip_tags($folder . '/' . $filename);
    }

    public function download($file)
    {
        return  response()->download(public_path($file));
    }
    // if ($request->file('selfie')) {
    //     $file = $request->file('selfie');
    //     $filename = date('YmdHi') . $file->getClientOriginalName();
    //     $file->move(public_path('images'), $filename);
    //     $user->selfie = strip_tags('images/' . $filename);
    // }
}
