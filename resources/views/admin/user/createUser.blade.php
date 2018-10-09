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

	<form action="{{Route('createUser')}}" method="post">

		<input type="hidden" name="_token" value="{{csrf_token()}}">

		<table class='table table-hover table-responsive table-bordered'>
				
			
				<tr>
					<th>Name</th>
					<td>
						<input class="form-control" type="text" name="name" >
					</td>				
				</tr>
			
				<tr>
					<th>Email</th>
					<td>
						<input class="form-control" type="text" name="price" >
					</td>				
				</tr>
				<tr>
					<th>Password</th>
					<td>
						<input class="form-control" type="password" name="sale" >
					</td>				
				</tr>
							
				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-primary"><i class='glyphicon glyphicon-plus'></i> Create </button>
					</td>
				</tr>
		</table>
		
	</form>
@endsection