@extends ('layout.app')
@section('judul_halaman', 'Daftar Menu')
@section('content')

<form action="{{ base_url('akun/addCart') }}" method="POST">
	<div class="row">
		@foreach ($menu as $m)
		<div class="col-md-4">
			<div class="card">
				<input type="hidden" name="id_menu" value="{{ $m['id_menu'] }}">
				<img name="image_menu" src="{{ base_url('assets/img/daftar_menu/') . $m['image_menu'] }}"
					class="card-img-top">
				<div class="card-body">
					<h5 name="nama_menu" class="card-title">{{ $m['nama_menu']}}</h5>
					<p name="harga_menu" class="card-text">Harga : {{ $m['harga_menu'] }}</p>
					<hr>
					<p name="stok_menu" class="card-text">Deskripsi : {{ $m['deskripsi'] }} </p>
					<div class="row text-right">
						<div><a href="{{ base_url('akun/hapus_menu/') . $m['id_menu'] }}"
							class="btn btn-sm btn-danger">Hapus</a></div>&nbsp
						<div><a href="{{ base_url('akun/edit_menu/') . $m['id_menu'] }}"
							class="btn btn-sm btn-primary">Edit</a></div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</form>

@endsection