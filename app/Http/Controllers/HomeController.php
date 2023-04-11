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
        $services = ServiceCategory::all();
        return view('Home.services',compact('services'));
    }

    function doctors (): View|Factory|Application
    {
        $doctors = Doctor::all();
        return view('Home.doctors',compact('doctors'));
    }

    function service ($name) : View|Factory|Application
    {
        $category = ServiceCategory::where('url_name','like',$name)->first();
        $services = Service::all()->where('id_service_category','=',$category->id);
        return view('Home.service',compact('services','category'));
    }
}
