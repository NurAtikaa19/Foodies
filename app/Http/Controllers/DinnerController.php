<?php

namespace App\Http\Controllers;

use App\Models\Dinner;
use Illuminate\Http\Request;

class DinnerController extends Controller
{
    public function index()
    {
        return view('dinner.index');
    }
}
