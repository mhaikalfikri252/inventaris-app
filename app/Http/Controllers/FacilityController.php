<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Facility;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facility = Facility::with('city')->get();

        return view('facility.index', compact('facility'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = City::all();

        return view('facility.create-form', compact('city'));
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
            'facility_code' => 'required',
            'facility_name' => 'required',
            'city_id' => 'required'
        ]);

        Facility::create($data);

        toast('Berhasil menambahkan fasilitas!', 'success');

        return redirect()->route('facility.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facility::with('city')->findOrFail($id);
        $city = City::all();

        return view('facility.update-form', compact('facility', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'facility_code' => 'required',
            'facility_name' => 'required',
            'city_id' => 'required',
        ];

        $data = $request->validate($rules);

        Facility::findOrFail($id)->update($data);

        toast('Berhasil mengedit fasilitas!', 'success');

        return redirect()->route('facility.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        Facility::destroy($facility->id);

        return redirect()->route('facility.index');
    }
}
