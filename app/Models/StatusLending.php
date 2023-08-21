<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLending extends Model
{
    use HasFactory;

    protected $table = 'status_lendings';

    protected $fillable = [
        'status_name'
    ];

    public function lending()
    {
        return $this->hasMany(Lending::class);
    }
}
