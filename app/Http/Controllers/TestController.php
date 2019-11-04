<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Path;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function test(){
        $getID3=new \getID3;
        $tags=$getID3->analyze(Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix('uploads/m4r7iT7i0KxAbp4rs0JlvAp5hnKHZMYgf3r2Cawe.mpga'));
//        $tags=$getID3->analyze(Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix('uploads/m21QJ2IBKsXheiLkDsK1dxPv0yapCRIfssQo4Llt.mpga'));
//        print_r($tags);
        echo $tags['tags']['id3v2']['artist'][0].'<br>';
        echo $tags['tags']['id3v2']['album'][0].'<br>';
        echo $tags['tags']['id3v2']['title'][0].'<br>';


    }
}