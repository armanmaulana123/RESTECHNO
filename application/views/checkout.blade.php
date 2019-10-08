@extends ('layout.app')
@section('judul', 'Checkout')
@section('judul_halaman', 'Checkout')
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

					@php
					form_open('path/to/controller/update/method');
					$ci = &get_instance();
					@endphp
					<form action="{{ base_url('akun/proses_checkout') }}" method="post">
						<table class="table table-striped">

							<tr style="background : linear-gradient(120deg, #3498db, #8e44ad)" class="text-light">
								<th style="text-align:center">Option</th>
								<th style="text-align:center">ID</th>
								<th style="text-align:center">Item Name</th>
								<th style="text-align:center">QTY</th>
								<th style="text-align:right">Item Price</th>
								<th style="text-align:center">Image</th>
								<th style="text-align:right">Sub-Total</th>
							</tr>


							@php
							$i = 1
							@endphp
							@foreach ($keranjang as $items)
							@php
							form_hidden($i.'[rowid]', $items['rowid']);
							@endphp
							<tr>
								<td style="text-align:center">
									<a href="{{ base_url('akun/hapus_item/') . $items['rowid'] }}"
										class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbspDelete</a>
									<a href="{{ base_url('akun/update_item/') . $items['rowid'] }}"
										class="btn btn-sm btn-success"><i class="fa fa-edit"></i>&nbspUpdate</a>

								</td>
								<td>
									<input type="hidden" name="id_menu" value="{{ $items['id'] }}">
									{{ $i++ }}
								</td>
								<td>
									{{ $items['name'] }}
									@php
									if ($ci->cart->has_options($items['rowid']) == TRUE):
									echo '<p>';
										foreach
										($ci->cart->product_options($items['rowid']) as
										$option_name =>
										$option_value):

										echo "<strong> $option_name </strong>
										$option_value <br />";

										endforeach;
										echo '</p>';
									endif;
									@endphp

								</td>
								<td>
									<input class="form-control" style="width:80px" type="number" name="qty"
										value={{ $items['qty'] }}>
								</td>

								@php
								echo '<td style="text-align:right">Rp.'.
									$ci->cart->format_number($items['price']). '</td>' ;
								@endphp

								<td style="text-align:center">
									<img src="{{ base_url('assets/img/daftar_menu/') . $items['gambar'] }}"
										class="img-thumbnail" style="width: 100px;">
								</td>

								@php
								echo '<td style="text-align:right">Rp.'.
									$ci->cart->format_number($items['subtotal']). '</td>' ;
								@endphp
							</tr>


							@endforeach

							<tr>
								<td colspan="5"> </td>
								<td class="right"><label for="total_bayar"><strong>Total</strong></label></td>
								<td class="right"><input type="text" class="form-control" name="total_bayar"
										value="Rp. {{ $ci->cart->format_number($ci->cart->total()) }}" readonly
										required>
								</td>
								</td>

							</tr>
						</table>
						<br />
						@php
						$kode_transaksi = date('dmY').strtoupper(Str_random(8));
						@endphp
						<input type="hidden" name="id_user" value="{{ $user['id_user'] }}">
						<input type="hidden" name="total_bayar" value="{{ $ci->cart->format_number($ci->cart->total()) }}">
						<table class="table">
							<thead>
								<tr>
									<th width="25%">Kode Transaksi</th>
									<th><input type="text" name="kode_transaksi" style="margin-left:20px; width:80%"
											class="form-control border-0" value="{{ $kode_transaksi }}" readonly
											required></th>
								</tr>
								<tr>
									<th width="25%">Nama Penerima</th>
									<th><input type="text" name="nama_penerima" style="margin-left:20px; width:80%"
											class="form-control border-0" placeholder="Nama Lengkap"
											value="{{ $user['nama'] }}" required></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Email Penerima</td>
									<th><input type="text" name="email_penerima" style="margin-left:20px; width:80%"
											class="form-control border-0" placeholder="E-mail"
											value="{{ $user['email'] }}" required></th>
								</tr>
								<tr>
									<td>No.Handphone Penerima</td>
									<th><input type="text" name="no_hp" style="margin-left:20px; width:80%"
											class="form-control border-0" placeholder="No.Handphone"
											value="{{ $user['no_hp'] }}" required></th>
								</tr>
								<tr>
									<td>Alamat Penerima</td>
									<td><textarea name="alamat_penerima" style="margin-left:20px; width:80%"
											class="form-control" placeholder="Alamat">{{ $user['alamat'] }}</textarea>
									</td>
								</tr>
								<tr>
									<td></td>
									<td align="right">
										<button class="btn btn-sm btn-success" type="submit">
											<i class="fa fa-save"></i>&nbspCheck Out
										</button>
										<a class="btn btn-sm btn-danger" href="#">
											<i class="fa fa-times"></i>&nbspReset
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection