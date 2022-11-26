<div class="header pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body" style="border-radius: 15px!important;">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title text-uppercase  text-muted mb-0">Customers</h4>
                                    <span class="h3 text-info font-weight-bold mb-0">{{ App\Models\Customer::all()->count() }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <a href="{{ route('customers_list') }}"><span class="text-muted text-nowrap">View Customers</span></a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title text-uppercase text-muted mb-0">Services</h4>
                                    <span class="h3 text-success font-weight-bold mb-0">{{ App\Models\Service::all()->count() }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape text-white bg-success rounded-circle shadow">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <a href="{{ route('show_services') }}"><span class="text-muted text-nowrap">View services</span></a>
                            </p>
                        </div>
                    </div>
                </div> 
     
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title text-uppercase  text-muted mb-0">Employees</h4>
                                    <span class="h3 text-primary font-weight-bold mb-0">{{ App\Models\Employee::all()->count() }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape text-white bg-primary rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <a href="{{ route('show_employees') }}"><span class="text-muted text-nowrap">View Employees</span></a>
                            </p>
                        </div>
                    </div>
                </div>  

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body text-info">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title text-muted text-uppercase mb-0">Daily Sales</h4>
                                    <span class="h3 text-warning font-weight-bold mb-0"> Ksh. {{ App\Models\Transaction::all()->sum('amount') }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                </div>
                            </div>
                               <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-muted">Since 8AM</span>

                                <a href="{{ route('all_transactions') }}" class="col-auto"><span class="text-info fa fa-chart-line float-right mt-2" title="View Transactions"></span></a>
                            </p>

                        <!--     <p class="mt-3 mb-0 text-muted text-sm">
                                <a href="{{ route('all_transactions') }}"><span class="text-white text-nowrap">View Transactions</span></a>
                            </p> -->
                        </div>
                    </div>
                </div>
<!--                 <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body bg-danger text-light">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title text-white mb-0">Hooks</h4>
                                    <span class="h3 text-white font-weight-bold mb-0">0</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-plain text-danger rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <a href=""><span class="text-white text-nowrap">View Hooks</span></a>
                            </p>
                        </div>
                    </div>
                </div> --> 

         <!--        <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                    <span class="h2 font-weight-bold mb-0">49,65%</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>