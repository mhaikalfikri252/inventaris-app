<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $guarded = [];


    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function asset()
    {
        return $this->hasMany(Asset::class);
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

    public function borrow()
    {
        return $this->hasMany(Borrow::class);
    }
}
