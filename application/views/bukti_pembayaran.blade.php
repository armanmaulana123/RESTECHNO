@extends ('layout.app')
@section('judul_halaman', 'Bukti Pembayaran')
@section('judul', 'Bukti Pembayaran')
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
					<hr />
					<div>
                    <form enctype="multipart/form-data" action="{{ base_url('akun/proses_bukti_pembayaran') }}" method="POST">
							<div class="row" style="margin-left: 50px;">
								<div>
									<label for="kode_transaksi">Kode Transaksi : </label>
									<input type="text" name="kode_transaksi" class="form form-control"
										value="{{ $detail_pesanan['kode_transaksi'] }}" readonly required>
								</div>
								<div style="margin-left: 80px;">
									<label for="total_bayar">Total Bayar : </label>
									<input type="text" name="total_bayar" class="form form-control"
										value="{{ $detail_pesanan['total_bayar'] }}" readonly required>
								</div>
								<div style="margin-left: 80px;">
									<label for="norek_tujuan">Nomor Rekening Tujuan : </label>
									<br />
									<label name="norek_tujuan"><img src="{{ base_url('assets/img/bank/bri.png') }}" style="width: 40px;"> :
										6319-0100-1561-505</label>
								</div>
							</div>
							<hr />
							<div class="row" style="margin-left: 50px;">
								<div>
                                    <label for="nama_pengirim">Nama Pengirim : </label>
                                    <input type="text" name="nama_pengirim" class="form form-control" autocomplete="off">
                                </div>
								<div style="margin-left: 80px;">
                                    <label for="norek_pengirim">Nomer Rekening Pengirim : </label>
                                    <input type="text" name="norek_pengirim" class="form form-control" autocomplete="off">
                                </div>
                                <div style="margin-left: 80px;">
                                    <label for="nama_bank">Pilih Bank Anda : </label>
                                    <select name="nama_bank" class="form form-control">
                                        <option></option>
                                        <option value="BRI">BRI</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="BNI">BNI</option>
                                        <option value="BCA">BCA</option>
                                        <option value="SIMPEDES">Mastercard</option>
                                    </select>
                                </div>
                            </div>
                            <hr/>
                            <div style="margin-left: 280px;">
                                <label for="bukti_pembayaran">Bukti Pembayaran : </label>
                                <input type="file" name="bukti_pembayaran" class="form form-control" style="width: 300px;">
                            </div>
                            <hr/>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success">Kirim</button>
                            </div>
						</form>
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