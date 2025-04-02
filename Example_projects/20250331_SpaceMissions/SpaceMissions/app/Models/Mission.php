<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mission extends Model
{
    protected $primaryKey = "_id";
    protected $table = 'missions';
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden = ['_id'];

    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class, 'agency_id', '_id');
    }
    public function commander(): HasOne
    {
        return $this->hasOne(Commander::class, 'mission_id', '_id');
    }
}
