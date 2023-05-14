<?php

namespace App\Actions;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use function PHPUnit\Framework\isEmpty;

class SubscribeDateAction
{
    public  function handle(int $id): Collection
    {
        $dates = \DB::table('schedules')->where('doctor_id','=',$id)->orderBy('schedules.date')->get();
        if($dates->isNotEmpty())
        $result = $dates->skipUntil(function ($item) {
            return $item->date === Carbon::now()->format('Y-m-d');
        });
        if(isEmpty($result))
            $result = null;
        return $result ?? $dates;
    }
}
