<?php

namespace App\Actions;

use Carbon\Carbon;

class SubscribeActiveListAction
{
    public  function handle(): ?array
    {
        $subs = \DB::table('subscribes')->join('doctors','subscribes.id_doctor','=','doctors.id')->
        join('service_categories','subscribes.id_service_category','=','service_categories.id')->
        join('services','subscribes.id_service','=','services.id')->where('subscribes.user_login','=',\Auth::user()->login)->
        select('doctors.full_name as name','service_categories.name as category','services.name as service','services.price as price','subscribes.date as date','subscribes.time as time',
            'doctors.img as img','doctors.specialization as specialization')->get();
        $deleted_subs = [];
        $now = Carbon::now();
        foreach ($subs as $sub){
            $date = Carbon::make($sub->date.$sub->time);
            if($date > $now)
                $deleted_subs[] = $sub;
        }
        if(count($deleted_subs) <= 0)
        $deleted_subs = null;

        return $deleted_subs;
    }
}
