<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'city';

    protected $fillable = [
        'city_name'
    ];

    public function facility()
    {
        return $this->hasMany(Facility::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
