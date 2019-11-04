<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Path;

class ImageController extends Controller
{
    public function upload(Request $request){
        $path=$request->file('image')->store('uploads','public');
        $mysql=new Path;
        $mysql->path=$path;
        $mysql->save();
        return view('welcome',compact('path'));
    }
}
