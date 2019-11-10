<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Path;
use App\MediaStream;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller {

    public function stream($path,Request $request) {
        $stream = new MediaStream('storage/uploads/'.$path);
        $stream->start();
    }
    

 
}
