<?php

namespace App\Http\Controllers\Redewe2m;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() 
    {
        return view('redewe2m.index');
    }
}

