<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Inventory;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{

    public function index_asset()
    {
        $asset = Asset::where('status_asset_id', 1)->with('facility', 'status')->get();

        return view('report.index-asset', compact('asset'));
    }

    public function index_writeoff()
    {
        $writeoff = Asset::where('status_asset_id', 2)->with('facility', 'status')->get();

        return view('report.index-writeoff', compact('writeoff'));
    }

    public function index_inventory()
    {
        $inventory = Inventory::with('facility')->get();

        return view('report.index-inventory', compact('inventory'));
    }

    public function index_borrow()
    {
        $borrow = Borrow::with('status_borrow')->get();

        return view('report.index-borrow', compact('borrow'));
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

    public function destroy_borrow($id)
    {
        Borrow::destroy($id);

        toast('Berhasil menghapus data!', 'success');

        return redirect()->back();
    }
}
