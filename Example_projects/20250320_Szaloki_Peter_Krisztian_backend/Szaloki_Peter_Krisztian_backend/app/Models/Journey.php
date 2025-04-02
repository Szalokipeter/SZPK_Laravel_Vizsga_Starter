<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Journey extends Model
{
    public $timestamps = false;
    protected $guarded = ["id"];


    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, "vehicle", "id");
    }
}
