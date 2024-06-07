<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MealTypeController extends Controller
{
    public function index()
    {
        return view('mealtype.breakfast.index');
    }

        public function breakfast()
    {
        $meals = Meal::all(); 
        return view('mealtype.breakfast.index', compact('meals')); 
    }

    public function lunch()
    {
        $meals = DB::table('your_lunch_table')->get();
        return view('mealtype.lunch.index', compact('meals'));
    }

    public function dinner()
    {
        $meals = DB::table('your_dinner_table')->get();
        return view('mealtype.dinner.index', compact('meals'));
    }

    // Tambahkan metode lainnya di sini untuk create, edit, show, delete
}
