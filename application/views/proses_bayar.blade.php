@extends ('layout.app')
@section('judul_halaman', 'Pembayaran')
@section('judul', 'Pembayaran')
@section('content')

<div class="card o-hidden border-0 shadow-lg" style="margin-top: 50px; margin-left: 80px; width: 950px;">
	<div class="card-body p-4">
		<!-- Nested Row within Card Body -->
		<div class="row">
			<div class=" d-none d-lg-block"></div>
			<div class="col-lg-12">
				<div class="p-4 mb-4">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">@yield('judul')</h1>
					</div>
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" href="#tunai" role="tab" data-toggle="tab">Tunai</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#rekening" role="tab" data-toggle="tab">Rekening</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="tunai">
							<form action="{{ base_url('akun/tunai') }}" method="POST">
								<div class="row ml-3 mt-3">
									<div style="margin-left: 110px;">
										<label for="total_bayar">Total Bayar :</label>
										<input type="text" name="total_bayar" class="form-control"
											value="Rp.{{ $detail_pesanan['total_bayar'] }}" readonly required>
									</div>
									<div style="margin-left: 200px;">
										<label for="kode_transaksi">Kode Transaksi :</label>
										<input type="text" name="kode_transaksi" class="form-control"
											value="{{ $detail_pesanan['kode_transaksi'] }}" readonly required>
									</div>
								</div>
								<hr />
								<div class="row">
									<div class="col-5">
										<img src="{{ base_url('assets/img/daftar_menu/'). $detail_keranjang['image_menu'] }}"
											class="img-thumbnail" style="width: 200px; margin-left: 100px;">
									</div>
									<div class="col-4 mt-3">
										<label>Nama Menu : </label>
										<br />
										<label>Jumlah Yang Dipesan : </label>
										<br />
										<label>Harga Menu : </label>
										<br />
										<label>Kategori Menu : </label>
									</div>
									<div class="col-1 mt-3">
										<label>&nbsp{{ $detail_keranjang['nama_menu'] }}</label>
										<br />
										<label>&nbsp{{ $detail_keranjang['qty'] }}</label>
										<br />
										<label>Rp.&nbsp{{ $detail_keranjang['sub_total'] }}</label>
										<br />
										<label>&nbsp{{ $detail_keranjang['kategori_menu'] }}</label>
									</div>
								</div>
								<hr />
								<div class="text-right">
									<button class="btn btn-success mt-3">Lanjutkan Pembayaran</button>
								</div>
							</form>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="rekening">
							<form action="{{ base_url('akun/rekening') }}" method="POST">
								<div class="row ml-3 mt-3">
									<div style="margin-left: 110px;">
										<label for="total_bayar">Total Bayar :</label>
										<input type="text" name="total_bayar" class="form-control"
											value="Rp.{{ $detail_pesanan['total_bayar'] }}" readonly required>
									</div>
									<div style="margin-left: 200px;">
										<label for="kode_transaksi">Kode Transaksi :</label>
										<input type="text" name="kode_transaksi" class="form-control"
											value="{{ $detail_pesanan['kode_transaksi'] }}" readonly required>
									</div>
								</div>
								<hr />
								<div class="row">
									<div class="col-5">
										<img src="{{ base_url('assets/img/daftar_menu/'). $detail_keranjang['image_menu'] }}"
											class="img-thumbnail" style="width: 200px; margin-left: 100px;">
									</div>
									<div class="col-4 mt-3">
										<label>Nama Menu : </label>
										<br />
										<label>Jumlah Yang Dipesan : </label>
										<br />
										<label>Harga Menu : </label>
										<br />
										<label>Kategori Menu : </label>
									</div>
									<div class="col-1 mt-3">
										<label>&nbsp{{ $detail_keranjang['nama_menu'] }}</label>
										<br />
										<label>&nbsp{{ $detail_keranjang['qty'] }}</label>
										<br />
										<label>Rp.&nbsp{{ $detail_keranjang['sub_total'] }}</label>
										<br />
										<label>&nbsp{{ $detail_keranjang['kategori_menu'] }}</label>
									</div>
								</div>
								<hr />
								<div class="text-right">
									<button type="submit" class="btn btn-success mt-3">Lanjutkan Pembayaran</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('custom_script')
<script>

</script>

@endsection