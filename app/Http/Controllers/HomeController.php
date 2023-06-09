<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    function services_category (): Factory|View|Application
    {
        $services = ServiceCategory::all();
        return view('Home.services',compact('services'));
    }

    function doctors (): View|Factory|Application
    {
        $doctors = DB::table('doctors')->join('service_categories','doctors.id_service_category','=','service_categories.id')
            ->select('doctors.id as id','doctors.full_name as full_name','doctors.img as img','doctors.experience as experience','doctors.specialization as specialization','service_categories.name as name','doctors.category as category')->get();
        $category = ServiceCategory::select('name','url_name')->get();
        return view('Home.doctors',compact('doctors','category'));
    }

    function service ($name) : Application|Factory|View|\Illuminate\Foundation\Application | RedirectResponse
    {
        $category = ServiceCategory::where('url_name','like',$name)->first();
        if($category){
            $services = Service::all()->where('id_service_category','=',$category->id);
            return view('Home.service',compact('services','category'));
        }
        return redirect()->back();
    }
}
