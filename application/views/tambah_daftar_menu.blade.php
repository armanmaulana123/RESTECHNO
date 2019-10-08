@extends ('layout.app')
@section('judul', 'Tambah Daftar Menu')
@section('judul_halaman', 'Tambah Daftar Menu')
@section('content')

<div class="card o-hidden border-0 shadow-lg" style="margin-top: 30px; margin-left: 240px; width: 550px;">
    <div class="card-body p-4">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class=" d-none d-lg-block"></div>
            <div class="col-lg-12">
                <div class="p-4 mb-4">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-5">@yield('judul')</h1>
                    </div>
                        <form class="user" enctype="multipart/form-data" action="{{ base_url('akun/aksi_tambah_menu') }}" method="POST">
                            <div class="form-group" style="margin-bottom: 30px;">
                                <div class="col-sm-15 mb-4">
                                    <select name="kategori_menu" id="kategori_menu" class="form-control ">
                                        <option>Makanan</option>
                                        <option>Minuman</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 30px;">
                                <div class="col-sm-15 mb-4">
                                    <input type="text" class="form-control " id="nama_menu" name="nama_menu" placeholder="Nama Menu">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 30px;">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " id="harga_menu" name="harga_menu" placeholder="Harga Menu">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control " id="deskripsi" name="deskripsi" placeholder="Deskripsi">
                                </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-15 mb-4">
                                        <label for="image">Foto Menu</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Add Menu
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection