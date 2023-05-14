<?php

namespace App\Actions;

use Carbon\Carbon;

class SubscribeDoctorListAction
{
    public  function week_handle(): ?array
    {
        $subs = \DB::table('subscribes')->join('doctors','subscribes.id_doctor','=','doctors.id')->
        join('users','users.login','=','subscribes.user_login')->
        join('services','subscribes.id_service_category','=','services.id')->where('doctors.id','=',\Auth::user()->tel_number)->
        select('users.full_name as name','users.birthday as birthday','users.sex as sex','services.name as service','subscribes.date as date','subscribes.time as time',
            'users.img as img')->get();

        $deleted_subs = [];
        foreach ($subs as $sub){
            $date = Carbon::make($sub->date.$sub->time);
            if($date->between(Carbon::now(),Carbon::now()->addWeek()))
                $deleted_subs[] = $sub;
        }

        if(count($deleted_subs) <= 0)
            $deleted_subs = null;

        return $deleted_subs;
    }

    public  function archive_handle (): ?array
    {
        $subs = \DB::table('subscribes')->join('doctors','subscribes.id_doctor','=','doctors.id')->
        join('users','users.login','=','subscribes.user_login')->
        join('services','subscribes.id_service_category','=','services.id')->where('doctors.id','=',\Auth::user()->tel_number)->
        select('users.full_name as name','users.birthday as birthday','users.sex as sex','services.name as service','subscribes.date as date','subscribes.time as time',
            'users.img as img')->get();

        $deleted_subs = [];
        $now = Carbon::now();
        foreach ($subs as $sub){
            $date = Carbon::make($sub->date.$sub->time);
            if($date < $now)
                $deleted_subs[] = $sub;
        }
        if(count($deleted_subs) <= 0)
            $deleted_subs = null;


        return $deleted_subs;
    }

    public  function after_week_handle(): ?array
    {
        $subs = \DB::table('subscribes')->join('doctors','subscribes.id_doctor','=','doctors.id')->
        join('users','users.login','=','subscribes.user_login')->
        join('services','subscribes.id_service_category','=','services.id')->where('doctors.id','=',\Auth::user()->tel_number)->
        select('users.full_name as name','users.birthday as birthday','users.sex as sex','services.name as service','subscribes.date as date','subscribes.time as time',
            'users.img as img')->get();

        $deleted_subs = [];
        $week = Carbon::now()->addWeek();
        foreach ($subs as $sub){
            $date = Carbon::make($sub->date.$sub->time);
            if($date > $week)
                $deleted_subs[] = $sub;
        }
        if(count($deleted_subs) <= 0)
            $deleted_subs = null;


        return $deleted_subs;
    }
}
