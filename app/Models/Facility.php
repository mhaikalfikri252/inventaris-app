<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $table = 'facilities';

    protected $fillable = [
        'facility_code',
        'facility_name',
        'city_id'
    ];

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
}
