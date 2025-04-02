<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agency extends Model
{
    protected $primaryKey = "_id";
    protected $table = "space_agencies";
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden = ['_id'];

    public function agency(): HasMany
    {
        return $this->hasMany(Mission::class, '_id', 'agency_id');
    }
}
