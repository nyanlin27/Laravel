<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dashbord($value = '')
    {
        return view('backend.dashbord');
    }
}
