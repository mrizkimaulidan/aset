<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{
    private $path = 'assets/images/profiles/';

    public function uploadProfilePicture(Request $request)
    {
        $image_name = Str::uuid() . '.' . $request->photo->extension();

        $request->photo->move(public_path($this->path), $image_name);

        return $this->path . $image_name;
    }
}
