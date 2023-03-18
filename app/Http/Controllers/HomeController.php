<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function services_category (): Factory|View|Application
    {
        $services_category = ServiceCategory::all();
        return view('Home.services_category',compact('services_category'));
    }

    function doctors (): View|Factory|Application
    {
        $doctors = Doctor::all();
        return view('Home.doctors',compact('doctors'));
    }

    function service ($id) : View|Factory|Application
    {
        $name = ServiceCategory::all()->where('id','=',$id)->first()->Name;
        $services = Service::all()->where('id_service_category','=',$id);
        return view('Home.service',compact('services','name'));
    }
}
