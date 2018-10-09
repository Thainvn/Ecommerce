@extends('layouts.app')

@section('content')
	
	<table class='table table-hover table-responsive table-bordered'>
			
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Price</th>
				<th>Sale</th>
				<th>Description</th>
				<th>Category</th>
			
			</tr>
	
			@foreach($products as $product)
	
			<tr>
				
				
				<td>{{$product->id}}</td>
				<td>{{$product->name}}</td>
				<td>{{$product->price}}</td>
				<td>{{$product->sale}}</td>
				<td>{{$product->description}}</td>
				<td>{{$product->category}}</td>
				
			</tr>
	
			
			@endforeach
			
	</table>
	<div>{{ $products->links() }}</div>
@endsection