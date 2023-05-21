<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscribe extends Model
{
    use HasFactory;
    public $timestamps = null;

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class,'id_doctor','id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class,'id_service_category','id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class,'id_service','id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_login','login');
    }
}
