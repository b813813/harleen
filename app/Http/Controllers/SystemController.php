<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function year()
    {
        return view('system.year');
    }
}
