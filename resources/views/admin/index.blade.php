@extends('layouts.admin.admin')
@section('title', 'Dashboard')
@section('content')
                           <!-- Content Wrapper START -->
                           <div class="main-content">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="m-b-0">Total Produk</p>
                                            <h2 class="m-b-0">
                                                <span>20</span>
                                            </h2>
                                        </div>
                                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                                            <i class="anticon anticon-shopping"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="m-b-0">Total Penjualan</p>
                                            <h2 class="m-b-0">
                                                <span>190</span>
                                            </h2>
                                        </div>
                                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                            <i class="anticon anticon-shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="m-b-0">Produk Terkirim</p>
                                            <h2 class="m-b-0">
                                                <span>180</span>
                                            </h2>
                                        </div>
                                        <div class="avatar avatar-icon avatar-lg avatar-red">
                                        <i class="fas fa-shipping-fast"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="m-b-0">Hasil Penjualan</p>
                                            <h2 class="m-b-0">
                                                <span>Rp. 6.500.000</span>
                                            </h2>
                                        </div>
                                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                                            <i class="anticon anticon-dollar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Chart Total Penjualan</h5>
                                    </div>
                                    <div class="m-t-50" style="height: 240px">
                                        <canvas class="chart" id="line-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Transaksi Terakhir</h5>
                                    </div>
                                    <div class="m-t-30">
                                        <div class="table-responsive overflow-auto">
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Customer</th>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>#5331</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="{{ asset('assets/images/avatars/thumb-1.jpg') }}" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Erin Gonzales</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>8 May 2019</td>
                                                        <td>$137.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-success badge-dot m-r-10"></span>
                                                                <span>Approved</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#5375</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="{{ asset('assets/images/avatars/thumb-2.jpg') }}" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Darryl Day</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>6 May 2019</td>
                                                        <td>$322.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-success badge-dot m-r-10"></span>
                                                                <span>Approved</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#5375</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="{{ asset('assets/images/avatars/thumb-2.jpg') }}" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Darryl Day</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>6 May 2019</td>
                                                        <td>$322.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-success badge-dot m-r-10"></span>
                                                                <span>Approved</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#5762</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="{{ asset('assets/images/avatars/thumb-3.jpg') }}" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Marshall Nichols</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>1 May 2019</td>
                                                        <td>$543.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-success badge-dot m-r-10"></span>
                                                                <span>Approved</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#5865</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="{{ asset('assets/images/avatars/thumb-4.jpg') }}" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Virgil Gonzales</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>28 April 2019</td>
                                                        <td>$876.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-primary badge-dot m-r-10"></span>
                                                                <span>Pending</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#5213</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="assets/images/avatars/thumb-5.jpg" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Nicole Wyne</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>28 April 2019</td>
                                                        <td>$241.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-success badge-dot m-r-10"></span>
                                                                <span>Approved</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->
@endsection
@section('js')
<script type="text/javascript">
    import themeColors from '../constant/theme-constant'

chart() {
    //Line Chart
    const lineChart = document.getElementById("line-chart");
    const lineCtx = lineChart.getContext('2d');
    lineChart.height = 120;
    const lineConfig = new Chart(lineCtx, {
        type: 'line',
        data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
                label: 'Series A',
                backgroundColor: themeColors.transparent,
                borderColor: themeColors.blue,
                pointBackgroundColor: themeColors.blue,
                pointBorderColor: themeColors.white,
                pointHoverBackgroundColor: themeColors.blueLight,
                pointHoverBorderColor: themeColors.blueLight,
                data: [65, 59, 80, 81, 56, 55, 40]
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                xAxes: [{ 
                    gridLines: [{
                        display: false,
                    }],
                    ticks: {
                        display: true,
                        fontColor: themeColors.grayLight,
                        fontSize: 13,
                        padding: 10
                    }
                }],
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        drawTicks: false,
                        borderDash: [3, 4],
                        zeroLineWidth: 1,
                        zeroLineBorderDash: [3, 4]  
                    },
                    ticks: {
                        display: true,
                        max: 100,                            
                        stepSize: 20,
                        fontColor: themeColors.grayLight,
                        fontSize: 13,
                        padding: 10
                    }  
                }],
            },
        }
    });
}
</script>
@endsection
