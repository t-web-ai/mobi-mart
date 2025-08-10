<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index($path)
    {
        if (Storage::fileExists("device/$path")) {
            $image = Storage::get("device/$path");
            $mime  = Storage::mimeType("device/$path");
            return response($image)->header("content-type", $mime);
        }
        abort(404);
    }
}
