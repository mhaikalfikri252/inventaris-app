<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventories';

    protected $guarded = [];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
