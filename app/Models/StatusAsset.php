<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAsset extends Model
{
    use HasFactory;

    protected $table = 'status_assets';

    protected $fillable = [
        'status_name'
    ];

    public function asset()
    {
        return $this->hasMany(Asset::class);
    }
}
