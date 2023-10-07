<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role_id == '1') {
            // admin
            $asset = DB::table('assets')->where('status_asset_id', 1)->count();
            $writeoff = DB::table('assets')->where('status_asset_id', 2)->count();
            $inventory = DB::table('inventories')->count();
            $borrow = DB::table('borrows')->count();
            $user = DB::table('users')->count();
            $employee = DB::table('employees')->count();
            $city = DB::table('cities')->count();
            $facility = DB::table('facilities')->count();

            return view('layouts.main-dashboard', compact('asset', 'writeoff', 'inventory', 'borrow', 'user', 'employee', 'city', 'facility'));
        } else {
            // user
            $location = auth()->user()->city_id;
            $facility = DB::table('facilities')
                ->where('city_id', $location)
                ->pluck('id');

            $asset = DB::table('assets')
                ->where('status_asset_id', 1)
                ->whereNot('status_borrow_id', 2)
                ->orWhereNull('status_borrow_id')
                ->whereIn('facility_id', $facility)
                ->count();

            $writeoff = DB::table('assets')
                ->where('status_asset_id', 2)
                ->whereIn('facility_id', $facility)
                ->count();

            $inventory = DB::table('inventories')
                ->whereIn('facility_id', $facility)
                ->count();

            $borrowasset = DB::table('assets')
                ->whereIn('facility_id', $facility)
                ->pluck('id');
            $borrow = DB::table('borrows')
                ->whereIn('asset_id', $borrowasset)
                ->count();

            return view('layouts.main-dashboard', compact('asset', 'writeoff', 'inventory', 'borrow'));
        }
    }
}
