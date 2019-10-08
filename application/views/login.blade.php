@extends ('layout.auth')
@section('judul', 'Login First')
@section('judul_halaman', 'Login Page')
@section('content')    
<form class="user" action="{{ base_url('auth/aksi_login') }}" method="post">
	<div class="form-group">
		<input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"
			name="email" placeholder="Enter Email Address...">
	</div>
	<div class="form-group">
		<input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password"
			placeholder="Password">
	</div>
	<div class="form-group">
		<div class="custom-control custom-checkbox small">
			<input type="checkbox" class="custom-control-input" id="customCheck">
			<label class="custom-control-label" for="customCheck">Remember
				Me</label>
		</div>
	</div>
	<button type="submit" class="btn btn-primary btn-user btn-block">
		Login
	</button>
</form>
@endsection