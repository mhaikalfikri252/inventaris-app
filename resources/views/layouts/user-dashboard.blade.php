<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php
                        $location = auth()->user()->city_id;
                        $facility = DB::table('facility')
                            ->where('city_id', $location)
                            ->pluck('id');
                        $asset = DB::table('assets')
                            ->where('status_id', 1)
                            ->whereIn('facility_id', $facility)
                            ->count();
                        ?>
                        <h3>{{ $asset }}</h3>


                        <p>Daftar Aset</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <a href="{{ route('asset.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <?php
                        $location = auth()->user()->city_id;
                        $facility = DB::table('facility')
                            ->where('city_id', $location)
                            ->pluck('id');
                        $writeoff = DB::table('assets')
                            ->where('status_id', 2)
                            ->whereIn('facility_id', $facility)
                            ->count();
                        ?>
                        <h3>{{ $writeoff }}</h3>


                        <p>Aset Write Off</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <a href="{{ route('writeoff.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php
                        $location = auth()->user()->city_id;
                        $facility = DB::table('facility')
                            ->where('city_id', $location)
                            ->pluck('id');
                        $inventories = DB::table('inventories')
                            ->whereIn('facility_id', $facility)
                            ->count();
                        ?>
                        <h3>{{ $inventories }}</h3>


                        <p>Daftar Inventaris</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <a href="{{ route('inventory.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <?php
                        $location = auth()->user()->city_id;
                        $facility = DB::table('facility')
                            ->where('city_id', $location)
                            ->pluck('id');
                        $asset = DB::table('assets')
                            ->whereIn('facility_id', $facility)
                            ->pluck('id');
                        $lending = DB::table('lendings')
                            ->whereIn('asset_id', $asset)
                            ->count();
                        ?>
                        <h3>{{ $lending }}</h3>


                        <p>Peminjaman Aset</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <a href="{{ route('lending.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
