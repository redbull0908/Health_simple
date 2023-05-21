<?php

namespace App\Actions;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class SubscribeDateAction
{
    public  function handle(int $id): ?Collection
    {
        $dates = \DB::table('schedules')->where('doctor_id','=',$id)->orderBy('schedules.date')->get();
        $collection = new Collection();
        if($dates->isNotEmpty())
        {
            foreach ($dates as $item){
                if(Carbon::make($item->date) >= Carbon::make(Carbon::now()->format('Y-m-d')))
                {
                    $collection->push($item);
                }
            }
            if($collection->count() <= 0){
                return null;
            }
            return $collection;
        }
        return null;
    }
}
