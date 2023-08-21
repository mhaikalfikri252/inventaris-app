<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'assets';

    protected $guarded = [];


    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function lending()
    {
        return $this->hasMany(Lending::class);
    }
}
