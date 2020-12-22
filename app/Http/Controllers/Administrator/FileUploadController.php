<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class FileUploadController extends Controller
{
    private $path = 'assets/images/profiles/';

    public function uploadProfilePicture(Request $request)
    {
        $image_file = $request->photo;
        $image_name = Str::uuid() . '.' . $image_file->extension();

        $request->photo->move(public_path($this->path), $image_name);

        $this->resizeImage($image_file, $image_name);

        return $this->path . $image_name;
    }

    public function resizeImage($image_file, $image_name)
    {
        $image = Image::make($image_file);

        $image->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($this->path . $image_name);
    }
}
