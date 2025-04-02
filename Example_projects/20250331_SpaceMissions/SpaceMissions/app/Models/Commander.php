<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Commander extends Model
{
    protected $primaryKey = "mission_id";
    protected $table = "mission_commanders";
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden = ['mission_id'];

    public function mission(): HasOne
    {
        return $this->hasOne(Mission::class, '_id', 'mission_id');
    }
}
