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
use Barryvdh\DomPDF\Facade\Pdf as PDF;

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
        $borrow = Borrow::whereIn('asset_id', $asset)
            ->with('status_borrow')->latest()->get();

        return view('borrow2.index', compact('borrow'));
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
        $asset = Asset::where('status_asset_id', 1)
            ->where(function ($query) {
                $query->where('status_borrow_id', 2)
                    ->orWhere('status_borrow_id', null);
            })
            ->whereIn('facility_id', $facility)
            ->with('facility')->latest()->get();
        $status_borrow = StatusBorrow::all();

        return view('borrow2.modal-create', compact('asset', 'status_borrow', 'employee'));
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

        date_default_timezone_set('Asia/Jakarta');
        $data['borrow_date'] = date('Y-m-d H:i:s', strtotime($data['borrow_date']));
        $data['return_date'] = date('Y-m-d H:i:s', strtotime($data['return_date']));

        if ($data['status_borrow_id'] == 2) {
            $request->validate(['letter' => 'required']);
        }

        if ($request->hasFile('letter')) {
            $file = $request->file('letter');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('files'), $filename);
            $data['letter'] = $filename;
        }

        // if ($data['status_borrow_id'] == 1) {
        //     $destination = 'files/' . $data['letter'];
        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }
        //     $data['letter'] = null;
        // }

        // dd($data['letter']);

        if ($borrow =  Borrow::create($data)) {
            $borrow->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $borrow
        ]);


        // toast('Berhasil menambahkan data!', 'success');

        // return redirect()->route('borrow.index');
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

        return view('borrow2.show', compact('borrow'));
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
        $asset = Asset::where('status_asset_id', 1)
            ->where(function ($query) {
                $query->where('status_borrow_id', 2)
                    ->orWhere('status_borrow_id', null);
            })
            ->whereIn('facility_id', $facility)
            ->with('facility')->latest()->get();
        $status_borrow = StatusBorrow::all();

        return view('borrow2.update', compact('asset', 'status_borrow', 'borrow', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(BorrowUpdateRequest $request, $id)
    // {
    //     $data = Borrow::findOrFail($id);
    //     $data->employee_id = $request->input('employee_id');
    //     $data->asset_id = $request->input('asset_id');
    //     $data->borrow_date = $request->input('borrow_date');
    //     $data->return_date = $request->input('return_date');
    //     $data->status_borrow_id = $request->input('status_borrow_id');

    //     date_default_timezone_set('Asia/Jakarta');
    //     $data->borrow_date = date('Y-m-d H:i:s', strtotime($data->borrow_date));
    //     $data->return_date = date('Y-m-d H:i:s', strtotime($data->return_date));

    //     if ($data->status_borrow_id == 2) {
    //         $request->validate(['letter' => 'required']);
    //     }

    //     if ($request->hasFile('letter')) {
    //         $destination = 'files/' . $data->letter;
    //         if (File::exists($destination)) {
    //             File::delete($destination);
    //         }

    //         $file = $request->file('letter');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extension;
    //         $file->move(public_path('files'), $filename);
    //         $data['letter'] = $filename;
    //     }

    //     if ($data->status_borrow_id == 1) {
    //         $destination = 'files/' . $data->letter;
    //         if (File::exists($destination)) {
    //             File::delete($destination);
    //         }
    //         $data->letter = null;
    //     }

    //     $data->update();

    //     toast('Berhasil mengedit data!', 'success');

    //     return redirect()->route('borrow2.index');
    // }

    public function update(Request $request, $id)
    {
        $data = Borrow::findOrFail($id);

        $rules = ['letter' => 'required'];

        $request->validate($rules);

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

        date_default_timezone_set('Asia/Jakarta');

        $data->update($data);

        toast('Berhasil mengupload surat pinjam!', 'success');

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

    public function print_borrow_letter($id)
    {
        $borrow = Borrow::findOrFail($id);
        $pdf = PDF::loadview('borrow2.letter', compact('borrow'));
        return $pdf->stream();
    }
}
