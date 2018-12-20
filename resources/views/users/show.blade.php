@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<h1>User Profile</h1>
		<img style="width:10%" id="profile-image1" src='/storage/profile_pic/{{$user->profile_pic}}'>
		<table class="table table-responsive">
			<tr>
				<td><b>Name:</b></td>
				<td>{{$user->first_name}} {{$user->last_name}}</td>
			</tr>
			<tr>
				<td><b>Email:</b></td>
				<td>{{$user->email}}</td>
			</tr>
			<tr>
				<td><b>Phone Number:</b></td>
				<td>{{$user->phone}}</td>
			</tr>
		</table>
	</div>
@endsection

