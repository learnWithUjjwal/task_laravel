@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="center">Users List</h1>
		<div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$user->first_name}} {{$user->last_name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->phone}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection