@extends('layouts.app')

@section('content')

	<div class="pull-right ">
		<a href="{{Route('allUser')}}" class="btn btn-primary m-b-10"><i class='glyphicon glyphicon-list'></i> Read Users </a>
	</div>
	
	<table class='table table-hover table-responsive table-bordered'>
			
			<tr>
				<th>Id</th>
				<td>{{$user->id}}</td>			
			</tr>
	
			<tr>
				<th>Name</th>
				<td>{{$user->name}}</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>{{$user->email}}</td>
			</tr>
		
			<tr>								
				<th>Role</th>
				
				<td>
					@if($user->role==1)
						Admin
					@else
						User
					@endif
				</td>
			
			</tr>			
			
			
	</table>
@endsection