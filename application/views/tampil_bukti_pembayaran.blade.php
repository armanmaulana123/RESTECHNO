@extends ('layout.app')
@section('judul', 'Bukti Pembayaran')
@section('judul_halaman', 'Bukti Pembayaran')
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
					<hr />
					<form action="{{ base_url('akun/konfirmasi_pembayaran') }}" method="POST">
					<input type="hidden" name="kode_transaksi" value="{{ $bukti['kode_transaksi'] }}">
					<div class="mt-4" style="margin-left: 80px;">
						<label>Kode Transaksi : {{ $bukti['kode_transaksi'] }}
					</div>
					<hr />
					<div style="margin-left: 60px;">
						<label>Nama Pengirim : {{ $bukti['nama_pengirim'] }}
					</div>
					<hr />
					<div style="margin-left: 60px;">
						<label>No. Rekening Pengirim : {{ $bukti['norek_pengirim'] }}</label>
					</div>
					<hr />
					<div class="row">
						<div style="margin-left: 130px;">
							<img src="{{ base_url('assets/img/bank/bri.png') }}" style="width: 20px;">
                        </div>
                        &nbsp
						<div>
							<img src="{{ base_url('assets/img/bank/bni.png') }}" style="width: 50px;">
                        </div>
                        &nbsp
                        <div>
                            <img src="{{ base_url('assets/img/bank/mandiri.jpg') }}" style="width: 50px;">
                        </div>
                        &nbsp
                        <div>
                            <img src="{{ base_url('assets/img/bank/bca.png') }}" style="width: 50px;">
                        </div>
                        &nbsp
                        <div>
                            <img src="{{ base_url('assets/img/bank/mastercard.jpg') }}" style="width: 50px;">
                        </div>
                    </div>
                    <div style="margin-left: 160px; margin-top: 10px;">
                        <label>Nama Bank : {{ $bukti['nama_bank'] }}
                    </div>
                    <hr/>
                    <div>
                        <label style="margin-left: 150px;">Bukti Pembayaran : </label>
                        <br/>
                        <img style="width: 300px; margin-left: 65px;" src="{{ base_url('assets/img/bukti_pembayaran/') . $bukti['bukti_pembayaran'] }}" class="img-thumbnail">
                    </div>
					<hr/>
					<div class="row">
						<div style="margin-left: 10px;">
							<a href="{{ base_url('akun/data_pesanan_admin') }}" class="btn btn-sm btn-danger" ><i class="fas fa-chevron-left"></i></a>
						</div>
						@if ($detail_pesanan['status'] == 'diproses')

						<div style="margin-left: 270px;">
							<button type="submit" class="btn btn-sm btn-success">Konfirmasi Pembayaran</button>
						</div>
						
						@endif
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection