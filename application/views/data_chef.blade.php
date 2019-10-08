@extends ('layout.app')
@section('judul_halaman', 'Chef')
@section('content')

<div align="center" class="mt-5">
	<h3>Daftar Chef</h3>
</div>

<table border="0" class="table table-bordered table-hover mt-3" align="center">
	<thead align="center" class="bg bg-primary text-light">
		<tr>
			<th>Nama</th>
			<th>Email</th>
			<th>No Handphone</th>
			<th>Alamat</th>
			<th>Level User</th>
			<th>Tanggal Daftar</th>
			<th>Image</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($tampil as $t)

		<tr align="center">
			<td>{{ $t['nama'] }}</td>
			<td>{{ $t['email'] }}</td>
			<td>{{ $t['no_hp'] }}</td>
			<td>{{ $t['alamat'] }}</td>
			<td>{{ $t['nama_level'] }}</td>
			<td>{{ $t['tanggal_pendaftaran'] }}</td>
			<td><img src=" {{ base_url('assets/img/profile/user/') . $t['image']}}" alt="" style="width: 60px; border-radius: 50px;"></td>


		</tr>
		@endforeach


	</tbody>
</table>


@endsection
@section('custom_script')
<script>
	// Page Akun
</script>

@endsection