<?php

namespace App\Http\Controllers;

use App\Models\Lunch;
use Illuminate\Http\Request;

class LunchController extends Controller
{
    public function index()
    {
        return view('lunch.index');
    }
}
