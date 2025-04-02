<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    public $timestamps = false;
    protected $guarded = ["id"];
    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class, 'seasonId', 'id');
    }
}
