@extends ('layout.app')
@section('judul', 'Tambah Driver')
@section('judul_halaman', 'Registration')
@section('content')


<div class="card o-hidden border-0 shadow-lg" style="margin-top: 50px; margin-left: 240px; width: 550px;">
    <div class="card-body p-4">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class=" d-none d-lg-block"></div>
            <div class="col-lg-12">
                <div class="p-4 mb-4">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">@yield('judul')</h1>
                    </div>
                        <form class="user" enctype="multipart/form-data" action="{{ base_url('akun/aksi_register_driver') }}" method="POST">
                            <div class="form-group">
                                <div class="col-sm-15 mb-4">
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Full Name">
                                </div>
                                <div class="col-sm-15 mb-4">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="Phone Number">
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-15 mb-4 mt-4">
                                        <textarea class="form-control form-control-user" id="alamat" name="alamat" placeholder="Your Address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-15 mb-4">
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection