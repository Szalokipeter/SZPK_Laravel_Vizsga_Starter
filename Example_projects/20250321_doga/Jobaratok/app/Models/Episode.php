<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    public $timestamps = false;
    protected $guarded = ["id"];
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class, "seasonId", "id");
    }
}
