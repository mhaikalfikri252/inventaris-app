<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryUpdateRequest;
use App\Models\Facility;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InventoryController extends Controller
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
        $inventory = Inventory::whereIn('facility_id', $facility)->with('facility')->get();

        return view('inventory.index', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = auth()->user()->city_id;
        $facility = Facility::where('city_id', $location)->get();

        return view('inventory.create-form', compact('facility'));
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
            'pic' => 'required|string|max:255',
            'price' => 'required|numeric|lt:1000000',
            'information' => 'required|string',
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
        $inventory = Inventory::with('facility')->findOrFail($id);

        return view('inventory.show-form', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::with('facility')->findOrFail($id);
        $location = auth()->user()->city_id;
        $facility = Facility::where('city_id', $location)->get();

        return view('inventory.edit-form', compact('inventory', 'facility'));
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
        $data->pic = $request->input('pic');
        $data->price = $request->input('price');
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
}
