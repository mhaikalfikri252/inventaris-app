@extends('slice.app')

@section('title')
    User
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User</h1>
                    </div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                {{-- <div class="form-group {{ $errors->get('email') ? 'has-error' : '' }}"> --}}
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" value="{{ old('username', $user->username) }}"
                                        required autofocus>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" value="{{ old('password', $user->password) }}"
                                        required>
                                    <input type="checkbox" id="checkbox">
                                    <small>Show Password</small>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    <select class="form-control @error('role_id') is-invalid @enderror" id="role_id"
                                        name="role_id" required>
                                        <option value="" disabled selected>Pilih Role</option>
                                        @foreach ($role as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $user->role_id ? 'selected' : '' }}>{{ $data->name }}
                                            </option>
                                            @error('role_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city_id">Kota</label>
                                    <select class="form-control" name="city_id" id="city_id" required>
                                        <option value="" disabled selected>Pilih Kota</option>
                                        @foreach ($city as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $user->city_id ? 'selected' : '' }}>
                                                {{ $data->city_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('user.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
