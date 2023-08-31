<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WriteOffController extends Controller
{
    public function index()
    {
        $location = auth()->user()->city_id;
        $facility = Facility::where('city_id', $location)->pluck('id');
        $writeoff = Asset::where('status_id', 2)->whereIn('facility_id', $facility)->with('facility', 'status')->get();

        return view('writeoff.index', compact('writeoff'));
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

        return redirect()->route('asset.index');
    }
}
