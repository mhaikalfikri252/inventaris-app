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

    public function status_asset()
    {
        return $this->belongsTo(StatusAsset::class);
    }

    public function status_borrow()
    {
        return $this->belongsTo(StatusBorrow::class);
    }

    public function borrow()
    {
        return $this->hasMany(Borrow::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
