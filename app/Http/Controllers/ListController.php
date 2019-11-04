<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Path;

class ListController extends Controller
{
    public function list(){
        $paths=Path::all();
        return view('list',compact('paths'));
    }
}
