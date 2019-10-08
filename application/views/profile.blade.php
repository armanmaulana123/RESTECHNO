@extends ('layout.app')
@section('judul_halaman', 'Profile')
@section('content')

<div class="card o-hidden border-0 shadow-lg mx-auto" style="width:400px; ">
<img class="card-img-top" style="border-radius: 50px;" src="{{ base_url('assets/img/profile/user/') . $user['image'] }}" alt="Card image">
    <div class="card-body">
    <h4 class="card-title">{{ $user['nama'] }}</h4>
    <hr/>
    <p class="card-text">Email : {{ $user['email'] }}</p>
    <p class="card-text">No. Handphone : {{ $user['no_hp'] }} </p>
    <p class="card-text">Alamat : {{ $user['alamat'] }}</p> 
    <p class="card-text">Sebagai : {{ $user['nama_level'] }} </p>
    <p class="card-text">Terdaftar sejak : {{ $user['tanggal_pendaftaran'] }} </p>
    </div>
  </div>

@endsection
@section('custom_script')
    <script>
    
    // Page Akun
    
    </script>
    
@endsection