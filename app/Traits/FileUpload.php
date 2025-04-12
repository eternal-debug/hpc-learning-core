<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use phpDocumentor\Reflection\Types\Boolean;
use File;

trait FileUpload
{

    public function uploadFile(UploadedFile $file, string $directory = 'uploads') : string
    {
        $filename = 'hpceducore_'.uniqid().'.'.$file->getClientOriginalExtension();

        $file->move(public_path($directory), $filename);

        return '/'.$directory.'/'.$filename;
    }

    public function deleteFile(string $path) : bool
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
            return true;
        }
        return false;
    }
}