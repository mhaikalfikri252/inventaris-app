<div class="row">
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="ti-package bg-c-pink card1-icon"></i>
                <span class="text-c-pink f-w-600">Daftar Aset</span>
                <h4>{{ $asset }}</h4>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="ti-layout-placeholder bg-c-green card1-icon"></i>
                <span class="text-c-green f-w-600">Aset Write Off</span>
                <h4>{{ $writeoff }}</h4>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="ti-archive bg-c-yellow card1-icon"></i>
                <span class="text-c-yellow f-w-600">Daftar Inventaris</span>
                <h4>{{ $inventory }}</h4>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <!-- card1 start -->
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="ti-write bg-c-brown card1-icon"></i>
                <span class="text-c-brown f-w-600">Peminjaman Aset</span>
                <h4>{{ $borrow }}</h4>
            </div>
        </div>
    </div>
    <!-- card1 end -->
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Donut chart</h5>
                <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
            </div>
            <div class="card-block">
                <div id="chart_donut" style="width: 100%; height: 300px;"></div>
            </div>
        </div>
    </div>
</div>
