<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    public $timestamps = false;
    protected $guarded = ["id"];
    public function journeys(): HasMany
    {
        return $this->hasMany(Journey::class, 'vehicle', 'id');
    }
}
