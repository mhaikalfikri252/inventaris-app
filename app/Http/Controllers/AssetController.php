<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetUpdateRequest;
use App\Models\Asset;
use App\Models\Employee;
use App\Models\Facility;
use App\Models\StatusAsset;
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
        $location = auth()->user()->city_id;
        $facility = Facility::where('city_id', $location)->pluck('id');
        $asset = Asset::where('status_asset_id', 1)->whereNot('status_borrow_id', 2)->orWhereNull('status_borrow_id')->whereIn('facility_id', $facility)->with('facility', 'status_asset')->get();

        return view('asset.index', compact('asset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status_asset = StatusAsset::all();
        $location = auth()->user()->city_id;
        $facility = Facility::where('city_id', $location)->get();
        $employee = Employee::where('city_id', $location)->get();

        return view('asset.create-form', compact('facility', 'status_asset', 'employee'));
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

        toast('Berhasil menambahkan aset!', 'success');

        if ($data['status_asset_id'] == 1) {
            return redirect()->route('asset.index');
        } else if ($data['status_asset_id'] == 2) {
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
        $asset = Asset::with('facility', 'status_asset')->findOrFail($id);
        $location = auth()->user()->city_id;
        $facility = Facility::where('city_id', $location)->get();
        $employee = Employee::where('city_id', $location)->get();
        $status_asset = StatusAsset::all();

        return view('asset.update-form', compact('asset', 'facility', 'status_asset', 'employee'));
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

        toast('Berhasil mengedit aset!', 'success');

        if ($data['status_asset_id'] == 1) {
            return redirect()->route('asset.index');
        } else if ($data['status_asset_id'] == 2) {
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

        toast('Berhasil menghapus aset!', 'success');

        if ($asset->status_asset_id == 1) {
            return redirect()->route('asset.index');
        } else if ($asset->status_asset_id == 2) {
            return redirect()->route('writeoff.index');
        }
    }
}
