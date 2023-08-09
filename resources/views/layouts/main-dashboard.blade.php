@extends('slice.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        @if (auth()->user()->role_id == '1')
            @include('layouts.admin-dashboard')
        @else
            @include('layouts.user-dashboard')
        @endif
    </div>
@endsection
