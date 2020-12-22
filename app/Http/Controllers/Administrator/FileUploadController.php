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
        $image_name = Str::uuid() . '.' . $request->photo->extension();

        $image = Image::make($request->photo);

        $request->photo->move(public_path($this->path), $image_name);

        $image->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($this->path . $image_name);

        return $this->path . $image_name;
    }
}
