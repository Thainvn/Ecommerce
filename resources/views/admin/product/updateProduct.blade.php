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
		<a href="{{Route('homeAdmin')}}" class="btn btn-primary m-b-10"><i class='glyphicon glyphicon-list'></i> Read Proucts </a>
	</div>
	
	<form action="{{Route('updateProduct',$product->id)}}" method="post">

		<input type="hidden" name="_token" value="{{csrf_token()}}">

		<table class='table table-hover table-responsive table-bordered'>
				
				<tr>
					<th>Id</th>
					<td>
						<input class="form-control" type="text" name="id" value="{{$product->id}}">
						
					</td>				
				</tr>
				<tr>
					<th>Name</th>
					<td>
						<input class="form-control" type="text" name="name" value="{{$product->name}}">
					</td>				
				</tr>
				<tr>
					<th>Description</th>
					<td>
					<textarea class="form-control" name="description"  cols="20" rows="10">{{$product->description}}</textarea>
					</td>				
				</tr>
				<tr>
					<th>Price</th>
					<td>
						<input class="form-control" type="text" name="price" value="{{$product->price}}">
					</td>				
				</tr>
				<tr>
					<th>Sale</th>
					<td>
						<input class="form-control" type="text" name="sale" value="{{$product->sale}}">
					</td>				
				</tr>
				<tr>
					<th>Category</th>
					<td>
						<input class="form-control" type="text" name="category" value="{{$product->category}}">
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