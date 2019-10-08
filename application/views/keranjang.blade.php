@extends ('layout.app')
@section('judul_halaman', 'Keranjang')
@section('judul', 'Keranjang')
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
								<a href="{{ base_url('akun/update_item/') . $items['rowid'] }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>&nbspUpdate</a>
								
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
								<input class="form-control" style="width:80px" type="number" name="qty" value={{ $items['qty'] }}>
							</td>
							
							@php
							echo '<td style="text-align:right">Rp.'.
								$ci->cart->format_number($items['price']). '</td>' ;
							@endphp

							<td style="text-align:center">
								<img src="{{ base_url('assets/img/daftar_menu/') . $items['gambar'] }}" class="img-thumbnail" style="width: 100px;">
							</td>

							@php
							echo '<td style="text-align:right">Rp.'.
								$ci->cart->format_number($items['subtotal']). '</td>' ;
							@endphp
						</tr>


						@endforeach

						<tr>
							<td colspan="5"> </td>
							<td class="right"><label for="total_bayar"><strong>Total :</strong></label></td>
							<td class="right">
							<input type="text" class="form-control" name="total_bayar" value="Rp. {{ $ci->cart->format_number($ci->cart->total()) }}" readonly required>
							</td>

						</tr>

					</table>
					<div class="text-right">
						<a class="btn btn-sm btn-warning" href="{{ base_url('akun/hapusCart') }}">Delete Cart</a>
						<a class="btn btn-sm btn-success" href="{{ base_url('akun/checkout') }}">Check Out</a>
					</div>
					<div>
						<a class="btn btn-primary" href="{{ base_url('akun/daftar_menu_user') }}">Lanjut Belanja</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('custom_script')
<script>
	// Page Akun
</script>

@endsection