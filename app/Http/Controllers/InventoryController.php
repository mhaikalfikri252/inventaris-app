<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryUpdateRequest;
use App\Models\Employee;
use App\Models\Facility;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role_id == 1) {
            $inventory = Inventory::with('facility')->latest()->get();
        } else {
            $location = auth()->user()->city_id;
            $facility = Facility::where('city_id', $location)->pluck('id');
            $inventory = Inventory::whereIn('facility_id', $facility)
                ->with('facility')->latest()->get();
        }

        return view('inventory.index', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role_id == 1) {
            $facility = Facility::all();
            $employee = Employee::all();
        } else {
            $location = auth()->user()->city_id;
            $facility = Facility::where('city_id', $location)->get();
            $employee = Employee::where('city_id', $location)->get();
        }

        return view('inventory.create', compact('facility', 'employee'));
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
            'inventory_name' => 'required|string|max:255',
            'facility_id' => 'required',
            'purchase_date' => 'required|date',
            'location' => 'required|max:255',
            'employee_id' => 'required',
            'price' => 'required|numeric',
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

        if ($inventory = Inventory::create($data)) {
            $inventory->save();
        }

        toast('Berhasil menambahkan inventaris!', 'success');

        return redirect()->route('inventory.index');
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
            $inventory = Inventory::with('facility')->findOrFail($id);
            $facility = Facility::all();
            $employee = Employee::all();
        } else {
            $inventory = Inventory::with('facility')->findOrFail($id);
            $location = auth()->user()->city_id;
            $facility = Facility::where('city_id', $location)->get();
            $employee = Employee::where('city_id', $location)->get();
        }

        return view('inventory.update', compact('inventory', 'facility', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryUpdateRequest $request, $id)
    {
        $data = Inventory::findOrFail($id);
        $data->inventory_name = $request->input('inventory_name');
        $data->facility_id = $request->input('facility_id');
        $data->purchase_date = $request->input('purchase_date');
        $data->location = $request->input('location');
        $data->employee_id = $request->input('employee_id');
        $data->price = $request->input('price');
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

        toast('Berhasil mengedit inventaris!', 'success');

        return redirect()->route('inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        if ($inventory->photo == !null) {
            $destination = 'images/' . $inventory->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        Inventory::destroy($inventory->id);

        toast('Berhasil menghapus inventaris!', 'success');

        return redirect()->route('inventory.index');
    }

    public function print_inventory_qrcode($id)
    {
        $inventory = Inventory::findOrFail($id);
        $pdf = PDF::setPaper('A4', 'portrait')->loadview('inventory.qrcode', compact('inventory'));
        return $pdf->stream();
    }

    public function print_all_qrcode()
    {
        $acodes = request()->get('acodes');
        if (!empty($acodes)) $inventory = Inventory::whereIn('id', explode(',', $acodes))->get();
        else $inventory = Inventory::all();
        $pdf = PDF::setPaper('A4', 'portrait')->loadview('inventory.print', compact('inventory'));
        return $pdf->stream();
    }
}
