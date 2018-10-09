@extends('layouts.app')

@section('content')
	@if(Session::has('message'))
		<div class="alert alert-success">
			{{Session::get('message')}}
		</div>
	@endif

	@if(count($errors) > 0)
	   @foreach ($errors->all() as $error)
	      <div class="alert alert-danger">{{ $error }}</div>
	  @endforeach
	@endif
	
	<div class="pull-right ">
		<a href="{{Route('allUser')}}" class="btn btn-primary m-b-10"><i class='glyphicon glyphicon-list'></i> Read Users </a>
	</div>

	<form action="{{Route('updateUser',$user->id)}}" method="post">

		<input type="hidden" name="_token" value="{{csrf_token()}}">

		<table class='table table-hover table-responsive table-bordered'>
				
				<tr>
					<th>Id</th>
					<td>
						<input class="form-control" type="text" name="id" value="{{$user->id}}">
						
					</td>				
				</tr>
				<tr>
					<th>Name</th>
					<td>
						<input class="form-control" type="text" name="name" value="{{$user->name}}">
					</td>				
				</tr>
			
				<tr>
					<th>Email</th>
					<td>
						<input class="form-control" type="text" name="price" value="{{$user->email}}">
					</td>				
				</tr>
				<tr>
					<th>Role</th>
					<td>
						<input class="form-control" type="text" name="sale" value="@if($user->role) Admin @else User @endif">
					</td>				
				</tr>
							
				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-primary"><i class='glyphicon glyphicon-pencil'></i> Update </button>
					</td>
				</tr>
		</table>
		
	</form>
@endsection