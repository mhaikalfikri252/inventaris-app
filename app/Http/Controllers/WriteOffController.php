<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Facility;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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

        return redirect()->route('writeoff.index');
    }

    public function print_writeoff_qrcode($id)
    {
        $writeoff = Asset::findOrFail($id);
        $pdf = PDF::loadview('writeoff.qrcode', compact('writeoff'));
        return $pdf->stream();
    }

    public function print_all_qrcode_writeoff()
    {
        $acodes = request()->get('acodes');
        if (!empty($acodes)) $writeoff = Asset::whereIn('asset_code', explode(',', $acodes))->get();
        else $writeoff = Asset::all();
        $pdf = PDF::setPaper('A4', 'portrait')->loadview('writeoff.print', compact('writeoff'));
        return $pdf->stream();
    }
}
