<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Facility;
use Illuminate\Support\Facades\File;

class WriteOffController extends Controller
{
    public function index()
    {
        if (auth()->user()->role_id == 1) {
            $writeoff = Asset::where('status_asset_id', 2)
                ->with('facility', 'status_asset')->latest()->get();
        } else {
            $location = auth()->user()->city_id;
            $facility = Facility::where('city_id', $location)->pluck('id');
            $writeoff = Asset::where('status_asset_id', 2)
                ->whereIn('facility_id', $facility)
                ->with('facility', 'status_asset')->latest()->get();
        }

        return view('writeoff2.index', compact('writeoff'));
    }

    public function destroy(Asset $asset)
    {
        if ($asset->photo == !null) {
            $destination = 'images/' . $asset->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        Asset::destroy($asset->id);

        toast('Berhasil menghapus aset!', 'success');

        return redirect()->route('writeoff.index');
    }
}
