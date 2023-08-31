<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\City;
use App\Models\Facility;
use App\Models\Inventory;
use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{

    public function index_asset($id)
    {

        $facility = Facility::where('city_id', $id)->pluck('id');
        $asset = Asset::where('status_id', 1)->whereIn('facility_id', $facility)->with('facility', 'status')->get();
        $city = City::findOrFail($id);

        return view('report.index-asset', compact('asset', 'city'));
    }

    public function index_writeoff($id)
    {
        $facility = Facility::where('city_id', $id)->pluck('id');
        $writeoff = Asset::where('status_id', 2)->whereIn('facility_id', $facility)->with('facility', 'status')->get();
        $city = City::findOrFail($id);

        return view('report.index-writeoff', compact('writeoff', 'city'));
    }

    public function index_inventory($id)
    {
        $facility = Facility::where('city_id', $id)->pluck('id');
        $inventory = Inventory::whereIn('facility_id', $facility)->with('facility')->get();
        $city = City::findOrFail($id);

        return view('report.index-inventory', compact('inventory', 'city'));
    }

    public function index_lending($id)
    {
        $facility = Facility::where('city_id', $id)->pluck('id');
        $asset = Asset::whereIn('facility_id', $facility)->pluck('id');
        $lending = Lending::whereIn('asset_id', $asset)->with('status_lending')->get();
        $city = City::findOrFail($id);

        return view('report.index-lending', compact('lending', 'city'));
    }

    public function show_asset($id)
    {
        $asset = Asset::with('facility', 'status')->findOrFail($id);

        return view('report.show-asset', compact('asset'));
    }

    public function show_inventory($id)
    {
        $inventory = Inventory::with('facility')->findOrFail($id);

        return view('report.show-inventory', compact('inventory'));
    }

    public function show_lending($id)
    {
        $lending = Lending::with('asset', 'status_lending')->findOrFail($id);

        return view('report.show-lending', compact('lending'));
    }

    public function destroy_asset($id)
    {
        $asset = Asset::findOrFail($id);

        if ($asset->photo == !null) {
            $destination = 'images/' . $asset->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        Asset::destroy($id);

        toast('Berhasil menghapus aset!', 'success');

        return redirect()->back();
    }

    public function destroy_inventory($id)
    {
        $inventory = Inventory::findOrFail($id);

        if ($inventory->photo == !null) {
            $destination = 'images/' . $inventory->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        Inventory::destroy($id);

        toast('Berhasil menghapus inventaris!', 'success');


        return redirect()->back();
    }

    public function destroy_lending($id)
    {
        Lending::destroy($id);

        toast('Berhasil menghapus data!', 'success');

        return redirect()->back();
    }
}
