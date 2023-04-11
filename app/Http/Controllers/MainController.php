<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\ServiceCategory;

class MainController extends Controller
{
    public function main (){
        $doctors = Doctor::all();
        $services = ServiceCategory::all();
        return view('main',compact('services','doctors'));
    }
}
