<?php

namespace App\Actions;

use App\Models\Schedule_template;
use App\Models\Subscribe;
use Carbon\Carbon;
use function Psy\sh;

class SubscribeTimeAction {
    public function handle(int $id , string $date):array
    {
        $template = Schedule_template::all()->where('id','=',$id)->first();
        $now = Carbon::now();
        if($date === Carbon::now()->format('d-m-y')){
            $date = explode('-',$date);
            $date[2] = '20'.$date[2];
            $date = implode('-',array_reverse($date));
            $value_hour = (int)Carbon::now()->format('H');
            $value_minute = (int)Carbon::now()->format('i')%15;
            $value_time = Carbon::now()->format('H:i');
            if($value_hour >= (int)$template->time_to)
            {
                return ['Запишитесь на другой день'];
            }
            else
            {
                $time = [];
                if($value_minute == 0)
                {
                    if((int)$value_time < (int)$template->time_from)
                    {
                        $value_time = $template->time_from;
                    }
                    $time[]=$value_time;
                    $carbon = Carbon::make($value_time);
                    while($carbon->format('H:i') != $template->time_to)
                    {
                        $carbon->addMinutes($template->interval);
                        $time[] = $carbon->format('H:i');
                    }
                    $shed[] = Subscribe::all()->where('date','=',$date)->pluck('time');
                    $time = array_diff($time,[$template->time_to]);
                    return array_diff($time,$shed[0]->toArray());
                }
                else
                {
                    if((int)$value_time < (int)$template->time_from)
                    {
                        $value_time = $template->time_from;
                    }
                    else
                    $value_time = $now->addMinutes(15 - $value_minute)->format('H:i');
                    $time[]=$value_time;
                    $carbon = Carbon::make($value_time);
                    while($carbon->format('H:i') != $template->time_to)
                    {
                        $carbon->addMinutes($template->interval);
                        $time[] = $carbon->format('H:i');
                    }
                    $shed[] = Subscribe::all()->where('date','=',$date)->pluck('time');
                    $time = array_diff($time,[$template->time_to]);
                    return array_diff($time,$shed[0]->toArray());
                }
            }
        }
        else{
            $date = explode('-',$date);
            $date[2] = '20'.$date[2];
            $date = implode('-',array_reverse($date));
            $time = [$template->time_from];
            $carbon = Carbon::make($template->time_from);
            while($carbon->format('H:i') != $template->time_to)
            {
                $carbon->addMinutes($template->interval);
                $time[] = $carbon->format('H:i');
            }
            $shed[] = Subscribe::all()->where('date','=',$date)->pluck('time');
            $time = array_diff($time,[$template->time_to]);
            return array_diff($time,$shed[0]->toArray());
        }
    }
}
