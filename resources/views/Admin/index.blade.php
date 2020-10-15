@extends('layouts.app')

@section('content')
<style>
	h3{
		font-weight: bold;
		text-transform: uppercase;
	}
	.row{
		background-color: ;
	}
	.login, .register{
		text-align: center;
		padding: 100px 0;
	}
	.login .btn, .register .btn{
		padding: 4px 50px;
		margin: 10px 0;
	}
	.login{
		border-top: 2px;
		border-bottom: 2px;
		border-left: 2px;
		border-right: 0;
		border-color: #1d284b;
		border-style: solid;
	}
	.register{
		background-color: ;
		border: 2px solid #1d284b;
	}
	p{
		padding: 40px 40px;
		text-align: justify;
	}
	.btn{
		background-color: #006fbe;
		color: #ffffff;
	}
</style>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 login">
				<h3>Login</h3>
				<br>
				<h4>Have an account?</h4>
				<a href="/login" class="btn">Login</a>
				<p>
					Login and browse the website as an admin user in order to have access to CRUD operations.
				</p>
			</div>
			<div class="col-sm-6 register">
				<h3>Register</h3>
				<br>
				<h4>Don't have an account?</h4>
				<a href="/register" class="btn">Register</a>
			</div>
		</div>
	</div>
@endsection