<div class="main-content">
    <div class="container-fluid mt-6">
        <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">عدد المستخدمين</h5>
                      <span class="h2 font-weight-bold mb-0">{{$users->where('status',1)->where('pharmacy_id',null)->count()}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-single-02"></i>
                      </div>
                    </div>
                  </div>
               
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">عدد الصيداليات</h5>
                      <span class="h2 font-weight-bold mb-0">{{$pharmacies->count()}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-books"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">عدد الطلبات المرسلة</h5>
                      <span class="h2 font-weight-bold mb-0">{{$orders->count()}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-send"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">عدد الردود</h5>
                      <span class="h2 font-weight-bold mb-0">{{$orderCount}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-email-83"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        <div class="row">
          {{-- <div class="col-xl-8">
            <div class="card bg-default">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                    <h5 class="h3 text-white mb-0">Sales value</h5>
                  </div>
                  <div class="col">
                    <ul class="nav nav-pills justify-content-end">
                      <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}" data-prefix="$" data-suffix="k">
                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                          <span class="d-none d-md-block">Month</span>
                          <span class="d-md-none">M</span>
                        </a>
                      </li>
                      <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}" data-prefix="$" data-suffix="k">
                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                          <span class="d-none d-md-block">Week</span>
                          <span class="d-md-none">W</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <!-- Chart wrapper -->
                  <canvas id="chart-sales-dark" class="chart-canvas chartjs-render-monitor" style="display: block; width: 746px; height: 350px;" width="746" height="350"></canvas>
                </div>
              </div>
            </div>
          </div> --}}
          <div class="col-xl-12">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    {{-- <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6> --}}
                    <h5 class="h3 mb-0 text-center">احصائية بعدد الطلبات المرسلة خلال السنة</h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="chart-bars" class="chart-canvas chartjs-render-monitor" style="display: block; width: 334px; height: 350px;" width="334" height="350"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
     
    </div>
</div>
<script>
  
</script>
<script>var months = @json($months,JSON_PRETTY_PRINT);</script>
