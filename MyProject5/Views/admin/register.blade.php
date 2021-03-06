@extends('layout.master')

@section('title', 'Register')

@section('content')

<div class="container mt-5 mb-5">
	<div class="col-md-8 offset-md-2 table-bordered loginContainer p-5">

		@if(\Sysgem\Session::has('error_message'))
			{{\Sysgem\Session::flash('error_message')}}
		@endif

		@if(\Sysgem\Session::has('email_exist'))
			{{\Sysgem\Session::flash('email_exist')}}
		@endif

		@php 
			$oldValues = [];
		@endphp


		@if(\Sysgem\Session::has('errors'))
			@foreach(\Sysgem\Session::getAndRemove('errors') as $value)
				<p class="text-danger">{{ $value['message'] }}</p>

				@php
					$oldValues[$value['key']] = $value['value'];
				@endphp
			@endforeach
		@endif


		<h2 class="english1 text-center mb-3">Register User</h2>

		<form class="form" action="registerInsert" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" value="{{ isset($oldValues['username'])? $oldValues['username'] : '' }}" class="form-control rounded-0" name="username" id="username">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" value="{{ isset($oldValues['email'])? $oldValues['email'] : '' }}" class="form-control rounded-0" name="email" id="email">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" value="{{ isset($oldValues['password'])? $oldValues['password'] : '' }}" class="form-control rounded-0" name="password" id="password">
			</div>

			<div class="form-group">
				<label for="confirm_password">Confirm Password</label>
				<input type="password" value="{{ isset($oldValues['confirm_password'])? $oldValues['confirm_password'] : '' }}" class="form-control rounded-0" name="confirm_password" id="confirm_password">
			</div>
			
			<p></p>

			<div class="row no-gutters justify-content-end">
				<button class="btn btn-info">Register</button>
			</div>
		</form>
	</div>
</div>


@endsection