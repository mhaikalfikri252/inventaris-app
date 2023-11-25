<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetUpdateRequest;
use App\Models\Asset;
use App\Models\Employee;
use App\Models\Facility;
use App\Models\StatusAsset;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role_id == 1) {
            $asset = Asset::where('status_asset_id', 1)
                ->where(function ($query) {
                    $query->where('status_borrow_id', 2)
                        ->orWhere('status_borrow_id', null);
                })
                ->with('facility', 'status_asset')->latest()->get();
        } else {
            $location = auth()->user()->city_id;
            $facility = Facility::where('city_id', $location)->pluck('id');
            $asset = Asset::where('status_asset_id', 1)
                ->where(function ($query) {
                    $query->where('status_borrow_id', 2)
                        ->orWhere('status_borrow_id', null);
                })
                ->whereIn('facility_id', $facility)
                ->with('facility', 'status_asset')->latest()->get();
        }

        return view('asset.index', compact('asset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role_id == 1) {
            $status_asset = StatusAsset::all();
            $facility = Facility::all();
            $employee = Employee::all();
        } else {
            $status_asset = StatusAsset::all();
            $location = auth()->user()->city_id;
            $facility = Facility::where('city_id', $location)->get();
            $employee = Employee::where('city_id', $location)->get();
        }

        return view('asset.create', compact('facility', 'status_asset', 'employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'asset_code' => 'required|max:255|unique:assets,asset_code',
            'asset_name' => 'required|string|max:255',
            'facility_id' => 'required',
            'purchase_date' => 'required|date',
            'location' => 'required|max:255',
            'employee_id' => 'required',
            'price' => 'required|numeric|gte:1000000',
            'status_asset_id' => 'required',
            'information' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        date_default_timezone_set('Asia/Jakarta');
        $data['purchase_date'] = date('Y-m-d H:i:s', strtotime($data['purchase_date']));

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('images'), $filename);
            $data['photo'] = $filename;
        }

        if ($aset = Asset::create($data)) {
            $aset->save();
        }

        if ($data['status_asset_id'] == 1) {
            toast('Berhasil menambahkan aset!', 'success');
            return redirect()->route('asset.index');
        } else if ($data['status_asset_id'] == 2) {
            toast('Berhasil menambahkan aset writeoff!', 'success');
            return redirect()->route('writeoff.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->role_id == 1) {
            $asset = Asset::with('facility', 'status_asset')->findOrFail($id);
            $facility = Facility::all();
            $employee = Employee::all();
            $status_asset = StatusAsset::all();
        } else {
            $asset = Asset::with('facility', 'status_asset')->findOrFail($id);
            $location = auth()->user()->city_id;
            $facility = Facility::where('city_id', $location)->get();
            $employee = Employee::where('city_id', $location)->get();
            $status_asset = StatusAsset::all();
        }

        return view('asset.update', compact('asset', 'facility', 'status_asset', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssetUpdateRequest $request, $id)
    {
        $data = Asset::findOrFail($id);
        $data->asset_code = $request->input('asset_code');
        $data->asset_name = $request->input('asset_name');
        $data->facility_id = $request->input('facility_id');
        $data->purchase_date = $request->input('purchase_date');
        $data->location = $request->input('location');
        $data->employee_id = $request->input('employee_id');
        $data->price = $request->input('price');
        $data->status_asset_id = $request->input('status_asset_id');
        $data->information = $request->input('information');

        date_default_timezone_set('Asia/Jakarta');
        $data->purchase_date = date('Y-m-d H:i:s', strtotime($data->purchase_date));

        if ($request->hasFile('photo')) {
            $destination = 'images/' . $data->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('images'), $filename);
            $data['photo'] = $filename;
        }

        $data->update();

        if ($data['status_asset_id'] == 1) {
            toast('Berhasil mengedit aset!', 'success');
            return redirect()->route('asset.index');
        } else if ($data['status_asset_id'] == 2) {
            toast('Berhasil mengedit aset write off!', 'success');
            return redirect()->route('writeoff.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        if ($asset->photo == !null) {
            $destination = 'images/' . $asset->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        Asset::destroy($asset->id);

        if ($asset->status_asset_id == 1) {
            toast('Berhasil menghapus aset!', 'success');
            return redirect()->route('asset.index');
        } else if ($asset->status_asset_id == 2) {
            toast('Berhasil menghapus aset write off!', 'success');
            return redirect()->route('writeoff.index');
        }
    }

    public function print_asset_qrcode($id)
    {
        $asset = Asset::findOrFail($id);
        $pdf = PDF::setPaper('A4', 'portrait')->loadview('asset.qrcode', compact('asset'));
        return $pdf->stream();
    }

    public function print_all_qrcode_asset()
    {
        $acodes = request()->get('acodes');
        if (!empty($acodes)) $asset = Asset::whereIn('asset_code', explode(',', $acodes))->get();
        else $asset = Asset::all();
        $pdf = PDF::setPaper('A4', 'portrait')->loadview('asset.print', compact('asset'));
        return $pdf->stream();
    }
}
