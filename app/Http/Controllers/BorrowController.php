<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowUpdateRequest;
use App\Models\Asset;
use App\Models\Facility;
use App\Models\Borrow;
use App\Models\Employee;
use App\Models\StatusBorrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BorrowController extends Controller
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
        $asset = Asset::whereIn('facility_id', $facility)->pluck('id');
        $borrow = Borrow::whereIn('asset_id', $asset)->with('status_borrow')->get();

        return view('borrow.index', compact('borrow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = auth()->user()->city_id;
        $facility = Facility::where('city_id', $location)->pluck('id');
        $employee = Employee::where('city_id', $location)->get();
        $asset = Asset::where('status_asset_id', 1)->whereNot('status_borrow_id', 2)->orWhereNull('status_borrow_id')->whereIn('facility_id', $facility)->with('facility')->get();
        $status_borrow = StatusBorrow::all();

        return view('borrow.create-form', compact('asset', 'status_borrow', 'employee'));
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
            'employee_id' => 'required',
            'asset_id' => 'required',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:borrow_date',
            'status_borrow_id' => 'required',
            'letter' => 'nullable',
        ]);

        $data['borrow_date'] = date('Y-m-d H:i:s', strtotime($data['borrow_date']));
        $data['return_date'] = date('Y-m-d H:i:s', strtotime($data['return_date']));

        if ($request->hasFile('letter')) {
            $file = $request->file('letter');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('files'), $filename);
            $data['letter'] = $filename;
        }

        if ($data['status_borrow_id'] == 2) {
            $destination = 'files/' . $data['letter'];
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $data['letter'] = null;
        }

        if ($borrow =  Borrow::create($data)) {
            $borrow->save();
        }

        toast('Berhasil menambahkan data!', 'success');

        return redirect()->route('borrow.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $borrow = Borrow::with('asset', 'status_borrow')->findOrFail($id);

        return view('borrow.show-form', compact('borrow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrow = Borrow::with('asset', 'status_borrow')->findOrFail($id);
        $location = auth()->user()->city_id;
        $facility = Facility::where('city_id', $location)->pluck('id');
        $employee = Employee::where('city_id', $location)->get();
        $asset = Asset::where('status_asset_id', 1)->whereNot('status_borrow_id', 2)->orWhereNull('status_borrow_id')->whereIn('facility_id', $facility)->with('facility')->get();
        $status_borrow = StatusBorrow::all();

        return view('borrow.update-form', compact('asset', 'status_bo$status_borrow', 'borrow', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BorrowUpdateRequest $request, $id)
    {
        $data = Borrow::findOrFail($id);
        $data->employee_id = $request->input('employee_id');
        // $data->asset_id = $request->input('asset_id');
        $data->borrow_date = $request->input('borrow_date');
        $data->return_date = $request->input('return_date');
        $data->status_borrow_id = $request->input('status_borrow_id');

        $data->borrow_date = date('Y-m-d H:i:s', strtotime($data->borrow_date));
        $data->return_date = date('Y-m-d H:i:s', strtotime($data->return_date));

        if ($request->hasFile('letter')) {
            $destination = 'files/' . $data->letter;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('letter');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('files'), $filename);
            $data['letter'] = $filename;
        }

        if ($data->status_borrow_id == 2) {
            $destination = 'files/' . $data->letter;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $data->letter = null;
        }

        $data->update();

        toast('Berhasil mengedit data!', 'success');

        return redirect()->route('borrow.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        if ($borrow->letter == !null) {
            $destination = 'files/' . $borrow->letter;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        Borrow::destroy($borrow->id);

        toast('Berhasil menghapus data!', 'success');

        return redirect()->route('borrow.index');
    }
}
