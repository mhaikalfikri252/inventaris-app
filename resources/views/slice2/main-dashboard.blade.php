@extends('slice2.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                @if (auth()->user()->role_id == 1)
                    @include('slice2.admin-dashboard')
                @else
                    @include('slice2.user-dashboard')
                @endif
            </div>
        </div>
    </div>
@endsection
