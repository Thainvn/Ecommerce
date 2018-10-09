@extends('layouts.app')

@section('content')

	@if(Request::has('key'))

		<h2>You search for : <span class="red-text">{{Request::get('key')}}</span></h2>

	@endif
	

	@if(Session::has('message'))
		<div class="alert alert-success">
			{{Session::get('message')}}
		</div>
	@endif
	
	<form role='search' action="{{Route('searchUser')}}" method="get">
	    <div class='input-group col-md-3 pull-left '>
	     
	        <input type='text' class='form-control' placeholder='Type user name or email...' name='key'  required  />

	        <div class='input-group-btn'>
	            <button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>
	        </div>

	    </div>
	</form>

	@if(Request::has('key'))
		<div class="pull-right">
			<a href="{{Route('allUser')}}" class="btn btn-primary m-b-10"><i class='glyphicon glyphicon-list'></i> Read Users </a>
		</div>
	@else
		<div class="pull-right">
			<a href="{{Route('createUser')}}" class="btn btn-primary m-b-10"><i class='glyphicon glyphicon-plus'></i> Create Users </a>
		</div>
	@endif

		@if(!empty($users))

			<table class='table table-hover table-responsive table-bordered'>
					
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				
						@foreach($users as $user)
				
						<tr>
							
							
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>
								@if($user->role==1)
									Admin
								@else
									User
								@endif
							</td>
										
							<td>
								<a class="btn btn-primary" href="{{Route('detailUser',$user->id)}}"><i class='glyphicon glyphicon-list'></i> Read </a>
								<a class="btn btn-info" href="{{Route('updateUser',$user->id)}}"><i class='glyphicon glyphicon-pencil'></i> Update </a>
								<a class="btn btn-danger"  href="{{Route('deleteUser',$user->id)}}" onclick=" return confirm('Are you sure?')"><i class='glyphicon glyphicon-trash'></i> Delete </a>
							</td>
						</tr>
				
						
						@endforeach
					
			</table>

			<div>{{$users->appends(['key'=>Request::get('key')])->render()}}</div>
		@endif

@endsection