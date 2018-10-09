@extends('layouts.app')

@section('content')


	

	
	
	
	@if(Session::has('message'))
		<div class="alert alert-success">
			{{Session::get('message')}}
		</div>
	@endif
	
	@if(!empty(Request::get('key')))
		<h3>You search for  : {{Request::get('key')}}</h3>
	@endif

	@if(count($products))
		
	@endif
	<div class="m-b-10">
		<!-- form for search  -->
		<form role='search' action="{{Route('filterProduct')}}" method="get">
			
		    <div class='input-group col-md-2 pull-left m-r-10'>
		     
		        <input type='text' class='form-control' placeholder='Type product name or description...' name='key'  />	       
		    </div>			
			<!-- form for filter category -->
		    <div class='input-group col-md-2 pull-left m-r-10'>
		     	    
		     	<select class="form-control" name="category">
		     		<option value="">Choose...</option>
			      	@foreach ($categories as $category)

			        	<option value="{{$category->category}}"  @if( Request::get('category')  == $category->category) selected="selected" @endif>
			     
			        		{{$category->category}}
			        	</option>

			      	@endforeach
		      	</select>
		      	
		    </div>
			<!-- form for filter price-->
		   	<div class='input-group col-md-2 pull-left m-r-10'>
		     	    
		     	<select class="form-control" name="price">
		     			<option value="">Choose...</option>

		     		<?php 

		     			$price = [5,8,12,15,20];
		     			$len = count($price);

		     			for ($i=0; $i < $len; $i++) { 
		     				
		     				echo "<option value='$price[$i]'";
		     					if(Request::get('price') == $price[$i]){
		     						echo 'selected="selected"';
		     					}
		     				echo "> $price[$i] </option>";
							
		     			}
		     		?>

		      	</select>
		      
		    </div>
		    <!-- submit button -->
			<div class='input-group-btn m-l-10'>
		    	<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>
			</div>

		</form>

		

		@if(Request::has('key'))
			<!-- create product button -->
			<div class="pull-right ">
				<a href="{{Route('homeAdmin')}}" class="btn btn-primary"><i class='glyphicon glyphicon-list'></i> Read Prouct </a>
			</div>

		@else

			<div class="pull-right ">
				<a href="{{Route('createProduct')}}" class="btn btn-primary"><i class='glyphicon glyphicon-plus'></i> Create Prouct </a>
			</div>

		@endif

		<div class="clearfix"></div>
	</div>

		@if(!empty($products))
			<table class='table table-hover table-responsive table-bordered'>
					
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Price</th>
						<th>Sale</th>
						<th style="width:300px;">Description</th>
						<th>Category</th>
						<th>Action</th>
					</tr>
				
						@foreach($products as $product)
				
						<tr>
							
							
							<td>{{$product->id}}</td>
							<td>{{$product->name}}</td>
							<td>{{$product->price}}</td>
							<td>{{$product->sale}}</td>
							<td style="width:300px;">{{$product->description}}</td>
							<td>{{$product->category}}</td>
							<td>
								<a class="btn btn-primary" href="{{Route('detailProduct',$product->id)}}"><i class='glyphicon glyphicon-list'></i> Read </a>
								<a class="btn btn-info" href="{{Route('updateProduct',$product->id)}}"><i class='glyphicon glyphicon-pencil'></i> Update </a>
								<a class="btn btn-danger" href="{{Route('deleteProduct',$product->id)}}" onclick="return confirm('Are you sure?')"><i class='glyphicon glyphicon-trash'></i> Delete </a>
							</td>
						</tr>
				
						
						@endforeach
					
			</table>

			<div>
				{{$products->appends(['key' => Request::get('key'), '&category' => Request::get('category'),'&price' => Request::get('price')])->render()}}
			</div>
	
		@endif
@endsection