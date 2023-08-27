<?php

namespace App\Http\Controllers;

use App\Http\Requests\LendingUpdateRequest;
use App\Models\Asset;
use App\Models\Facility;
use App\Models\Lending;
use App\Models\StatusLending;
use Illuminate\Http\Request;

class LendingController extends Controller
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
        $lending = Lending::whereIn('asset_id', $asset)->with('status_lending')->get();

        return view('lending.index', compact('lending'));
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
        $asset = Asset::where('status_id', 1)->whereIn('facility_id', $facility)->with('facility')->get();
        $status = StatusLending::all();

        return view('lending.create-form', compact('asset', 'status'));
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
            'person_name' => 'required|string|max:255',
            'asset_id' => 'required|unique:lendings,asset_id',
            'loan_date' => 'required|date',
            'return_date' => 'required|date',
            'status_lending_id' => 'required'
        ]);

        $data['loan_date'] = date('Y-m-d H:i:s', strtotime($data['loan_date']));
        $data['return_date'] = date('Y-m-d H:i:s', strtotime($data['return_date']));

        Lending::create($data);

        toast('Berhasil menambahkan data!', 'success');

        return redirect()->route('lending.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lending = Lending::with('asset', 'status_lending')->findOrFail($id);

        return view('lending.show-form', compact('lending'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lending = Lending::with('asset', 'status_lending')->findOrFail($id);
        $location = auth()->user()->city_id;
        $facility = Facility::where('city_id', $location)->pluck('id');
        $asset = Asset::where('status_id', 1)->whereIn('facility_id', $facility)->with('facility')->get();
        $status = StatusLending::all();

        return view('lending.edit-form', compact('asset', 'status', 'lending'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LendingUpdateRequest $request, $id)
    {
        $data = Lending::findOrFail($id);
        $data->person_name = $request->input('person_name');
        $data->asset_id = $request->input('asset_id');
        $data->loan_date = $request->input('loan_date');
        $data->return_date = $request->input('return_date');
        $data->status_lending_id = $request->input('status_lending_id');

        $data->loan_date = date('Y-m-d H:i:s', strtotime($data->loan_date));
        $data->return_date = date('Y-m-d H:i:s', strtotime($data->return_date));

        $data->update();

        toast('Berhasil mengedit data!', 'success');

        return redirect()->route('lending.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lending::destroy($id);

        toast('Berhasil menghapus data!', 'success');

        return redirect()->route('lending.index');
    }
}
