@extends('dashboard.layouts.master',['title'=>'الرئيسية'])
@section('content')

        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h4 class="mb-0"> الرئيسية</h4>
                </div>

            </div>
        </div>
        <!-- widgets -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body p-0">
                        <div class="bg-success">
                            <div class="d-block d-md-flex justify-content-between p-3">
                                <div class="d-block">
                                    <h5 class="text-white">Market up</h5>
                                </div>
                                <div class="d-block d-md-flex">
                                    <i class="mr-10 text-white fa fa-arrow-up"> </i>
                                    <h5 class="text-white"><b>463</b></h5>
                                </div>
                            </div>
                            <div id="sparkline7" class="text-center"></div>
                        </div>
                        <div class="p-3 bg-white">
                            <div class="row">
                                <div class="col-sm-6 col-6 align-self-center">
                                    <h5>Percentage Up</h5>
                                    <span class="text-success">655 Share</span>
                                </div>
                                <div class="col-sm-6 col-6 align-self-center text-right">
                                    <span class="round-chart mb-0" data-percent="84" data-size="80" data-color="#28a745"> <span class="percent"></span> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body p-0">
                        <div class="bg-danger">
                            <div class="d-block d-md-flex justify-content-between p-3">
                                <div class="d-block">
                                    <h5 class="text-white">Market down </h5>
                                </div>
                                <div class="d-block d-md-flex">
                                    <i class="mr-10 text-white fa fa-arrow-down"> </i>
                                    <h5 class="text-white"><b>466</b></h5>
                                </div>
                            </div>
                            <div id="sparkline8" class="text-center"></div>
                        </div>
                        <div class="p-3 bg-white">
                            <div class="row">
                                <div class="col-sm-6 col-6 align-self-center">
                                    <h5>Percentage Down</h5>
                                    <span class="text-danger">252 Share</span>
                                </div>
                                <div class="col-sm-6 col-6 align-self-center text-right">
                                    <span class="round-chart mb-0" data-percent="52" data-size="80" data-color="#dc3545"> <span class="percent"></span> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body p-0">
                        <div class="bg-warning">
                            <div class="d-block d-md-flex justify-content-between p-3">
                                <div class="d-block">
                                    <h5 class="text-white">Total revenue</h5>
                                </div>
                                <div class="d-block d-md-flex">
                                    <h5 class="text-white"><b>$657</b></h5>
                                </div>
                            </div>
                            <div id="sparkline9" class="text-center"></div>
                        </div>
                        <div class="p-3 bg-white">
                            <div class="row">
                                <div class="col-sm-6 col-6 align-self-center">
                                    <h5>Increase amount</h5>
                                    <span class="text-warning">$5260 total</span>
                                </div>
                                <div class="col-sm-6 col-6 align-self-center text-right">
                                    <span class="round-chart mb-0" data-percent="55" data-size="80" data-color="#ffc107"> <span class="percent"></span> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body p-0">
                        <div class="bg-dark">
                            <div class="d-block d-md-flex justify-content-between p-3">
                                <div class="d-block">
                                    <h5 class="text-white">Customer feedback</h5>
                                </div>
                                <div class="d-block d-md-flex">
                                    <h5 class="text-white"><b>789</b></h5>
                                </div>
                            </div>
                            <div id="sparkline10" class="text-center"></div>
                        </div>
                        <div class="p-3 bg-white">
                            <div class="row">
                                <div class="col-sm-6 col-6 align-self-center">
                                    <h5>New users</h5>
                                    Monthly user: <span class="text-success"> 6592</span>
                                </div>
                                <div class="col-sm-6 col-6 align-self-center text-right">
                                    <span class="round-chart mb-0" data-percent="77" data-size="80" data-color="#dc3545"> <span class="percent"></span> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--=================================
         wrapper -->

        <!--=================================
         footer -->



@stop
