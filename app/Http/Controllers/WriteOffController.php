<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Facility;
use Illuminate\Http\Request;

class WriteOffController extends Controller
{
    public function index()
    {
        $location = auth()->user()->city_id;
        $facility = Facility::where('city_id', $location)->pluck('id');
        $writeoff = Asset::where('status_id', 2)->whereIn('facility_id', $facility)->with('facility', 'status')->get();

        return view('writeoff.index', compact('writeoff'));
    }
}
