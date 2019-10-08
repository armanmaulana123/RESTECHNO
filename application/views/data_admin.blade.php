@extends ('layout.app')
@section('judul_halaman', 'Admin')
@section('content')

<div align="center" class="mt-5">
	<h3>Daftar Admin</h3>
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
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		{{-- @php
			return var_dump($tampil)
		@endphp --}}
		@foreach ($tampil as $t)

		<tr align="center">
			<td>{{ $t['nama'] }}</td>
			<td>{{ $t['email'] }}</td>
			<td>{{ $t['no_hp'] }}</td>
			<td>{{ $t['alamat'] }}</td>
			<td>{{ $t['nama_level'] }}</td>
			<td>{{ $t['tanggal_pendaftaran'] }}</td>
			<td><img src=" {{ base_url('assets/img/profile/user/') . $t['image']}}" alt="" style="width: 60px; border-radius: 50px;"></td>
			<td>
				<a class="btn btn-sm btn-danger" href="{{ base_url('akun/hapus/') . $t['id_user'] }}">Hapus</a>
				<a class="btn btn-sm btn-success" href="{{ base_url('akun/edit/') . $t['id_user'] }}">Edit</a>
			</td>

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