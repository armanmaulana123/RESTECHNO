@extends ('layout.app')
@section('judul_halaman', 'Akun')
@section('content')

    <div>
        <div><img src="{{ base_url('assets/img/restoran.png') }}" class="img-responsive" style="margin-left : 380px; border-radius: 80%; margin-top: 50px;"></div>
        <div style="margin-left: 250px;"><h2>Welcome Back {{ $user['nama']}}!</h2></div>
        <hr style="margin-top: 100px;"/>
        @if ($user['level_user'] == '1')
        <div>
                <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pesanan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah }}
                                </div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-file fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
            
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Menu Yang Tersedia</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $menu }}</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-utensils fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
            
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Member Yang Terdaftar</div>
                                  <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $member }}</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
            
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pesanan Menunggu Konfirmasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pesanan }}</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
        </div>  
        @endif
        
    </div>

@endsection
@section('custom_script')
    <script>
    
    // Page Akun
    
    </script>
    
@endsection