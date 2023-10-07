<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBorrow extends Model
{
    use HasFactory;

    protected $table = 'status_borrows';

    protected $fillable = [
        'status_name'
    ];

    public function borrow()
    {
        return $this->hasMany(Borrow::class);
    }

    public function asset()
    {
        return $this->hasMany(Asset::class);
    }
}
