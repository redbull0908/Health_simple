<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    public $timestamps = null;

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id','id');
    }

    public function template(){
        return $this->belongsTo(Schedule_template::class,'schedule_template_id','id');
    }
}
