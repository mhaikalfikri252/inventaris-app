<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';

    protected $guarded = [];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function status_borrow()
    {
        return $this->belongsTo(StatusBorrow::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            Asset::where('id', $model->asset_id)->update(['status_borrow_id' => $model->status_borrow_id]);
        });

        static::updated(function ($model) {
            // if ($model->asset_id == Asset::where('id', $model->asset_id)) {
            // Asset::where('id', $model->asset_id)->update(['status_borrow_id' => $model->status_borrow_id]);
            Asset::where('id', $model->asset_id)->update(['status_borrow_id' => 2]);
            // } else {
            // Asset::where('id', $model->asset_id)->update(['status_borrow_id' => null]);
            // }
        });

        static::deleted(function ($model) {
            Asset::where('id', $model->asset_id)->update(['status_borrow_id' => null]);
        });
    }
}
