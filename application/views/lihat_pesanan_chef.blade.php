@extends ('layout.app')
@section('judul', 'Data Pesanan')
@section('judul_halaman', 'Data Pesanan')
@section('content')


<div class="card o-hidden border-0 shadow-lg" style="margin-top: 50px; margin-left: 220px; width: 650px;">
	<div class="card-body p-4">
		<!-- Nested Row within Card Body -->
		<div class="row">
			<div class=" d-none d-lg-block"></div>
			<div class="col-lg-12">
				<div class="p-4 mb-4">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">@yield('judul')</h1>
					</div>
					<hr />
                    <form action="{{ base_url('akun/buat_menu') }}" method="POST">
                        <input type="hidden" name="kode_transaksi" value="{{ $pesanan['kode_transaksi'] }}">
                        <div class="row mt-3">
                            <div style="margin-left: 30px;">
                                <label for="id_pesanan">ID Pesanan : {{ $pesanan['id_keranjang'] }}</label>
                            </div>
                            <div style="margin-left: 110px;">
                                <label for="kode_transaksi">Kode Transaksi : {{ $pesanan['kode_transaksi'] }}</label>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-5">
                                <img src="{{ base_url('assets/img/daftar_menu/'). $pesanan['image_menu'] }}"
                                    class="img-thumbnail" style="width: 200px;">
                            </div>
                            <div class="col-4 mt-1">
                                <label>Nama Menu : </label>
                                <br />
                                <label>Jumlah Yang Dipesan : </label>
                                <br />
                                <label>Harga Menu : </label>
                                <br />
                                <label>Kategori Menu : </label>
                            </div>
                            <div class="col-1 mt-1">
                                <label>&nbsp{{ $pesanan['nama_menu'] }}</label>
                                <br />
                                <label>&nbsp{{ $pesanan['qty'] }}</label>
                                <br />
                                <label>Rp.&nbsp{{ $pesanan['sub_total'] }}</label>
                                <br />
                                <label>&nbsp{{ $pesanan['kategori_menu'] }}</label>
                            </div>
                        </div>
                        <hr />
                        <div>
                            <a href="{{ base_url('akun/pesanan_dibuat') }}" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i></a>
                        </div>
                        <div class="text-right">
                            @if ($detail_pesanan['status'] == 'Terkonfirmasi')
                            
                            <button type="submit" class="btn btn-success mt-3">Buat Pesanan</button>

                            @endif
                        </div>
                    </form>
                            <div class="text-right">
                                
                                @if ($detail_pesanan['status'] == 'dibuat')
                            
                                <form action="{{ base_url('akun/selesai_dibuat') }}" method="POST">
                                    <input type="hidden" name="kode_transaksi" value="{{ $pesanan['kode_transaksi'] }}">
                                    <button type="submit" class="btn btn-success mt-3">Selesai Dibuat</button>
                                </form>
    
                                @endif
                            </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection