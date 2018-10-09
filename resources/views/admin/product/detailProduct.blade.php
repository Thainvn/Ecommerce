@extends('layouts.app')

@section('content')

	<div class="pull-right ">
		<a href="{{Route('homeAdmin')}}" class="btn btn-primary m-b-10"><i class='glyphicon glyphicon-list'></i> Read Proucts </a>
	</div>

	<table class='table table-hover table-responsive table-bordered'>
			
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Price</th>
				<th>Sale</th>
				<th>Description</th>
				<th>Category</th>
			
			</tr>
	
		
			<tr>
								
				<td>{{$detailProduct->id}}</td>
				<td>{{$detailProduct->name}}</td>
				<td>{{$detailProduct->price}}</td>
				<td>{{$detailProduct->sale}}</td>
				<td>{{$detailProduct->description}}</td>
				<td>{{$detailProduct->category}}</td>
				
			</tr>
	
			
			
			
	</table>
@endsection