<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    use HasFactory;

    public $timestamps = null;

    public function service_category (): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class,'id_service_category','id');
    }
}
