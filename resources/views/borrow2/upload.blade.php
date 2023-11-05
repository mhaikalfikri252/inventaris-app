@extends('slice2.app')

@section('title')
    Peminjaman Aset
@endsection

@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                @if (auth()->user()->role_id == 1)
                                    <i class="fa fa-handshake-o bg-c-light-blue"></i>
                                @else
                                    <i class="fa fa-handshake-o bg-c-brown"></i>
                                @endif
                                <div class="d-inline">
                                    <h4 class="mt-3">Upload Surat Peminjaman Aset</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-block">
                                    <form action="{{ route('upload.borrow.letter', $borrow->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Upload Surat</label>
                                            <div class="col-sm-10">
                                                <input type="file"
                                                    class="form-control @error('letter') is-invalid @enderror"
                                                    id="letter" name="letter">
                                                @error('letter')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <button type="submit" class="btn btn-success btn-addsave">
                                                <i class="fa fa-save"></i> Save</button>
                                            <a href="{{ route('borrow.index') }}" class="btn btn-danger btn-printcancel">
                                                <i class="fa fa-times"></i> Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
