<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

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

            if (Asset::where('id', $model->asset_id)->where('status_borrow_id', 1)) {
                Borrow::where('asset_id', $model->asset_id)->where('status_borrow_id', 1)->update(['letter' => null]);
                $request = Request();
                if ($request->hasFile($model->letter)) {
                    $destination = 'files/' . $model->letter;
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                }
            }
        });

        static::updated(function ($model) {
            Asset::where('id', $model->asset_id)->update(['status_borrow_id' => $model->status_borrow_id]);
        });

        static::deleted(function ($model) {
            Asset::where('id', $model->asset_id)->update(['status_borrow_id' => null]);
        });
    }
}
