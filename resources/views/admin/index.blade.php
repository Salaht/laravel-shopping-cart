@extends('layouts.master')

@section('title')
Webshop
@endsection

@section('content')

<h1>Admin Dashboard</h1>
<br>
<div class="row">
	<a style="margin-bottom:10px;" href="{{ URL::to('product/create') }}" class="btn btn-primary">Add product</a>
</div>
<div class="row">
	<table id="holidays" class="table table-bordered">
		<thead class="thead-inverse">
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>ImagePath</th>
				<th>Catogorie</th>
				<th>Price</th>
				<th></th>
				<th></th>	
			</tr>
		</thead>

		<tbody>
			@foreach ($products as $product)
			<tr>
				<td>{{$product->title}}</td>
				<td>{{$product->description}}</td>
				<td><a href="{{$product->imagePath}}">{{$product->imagePath}}</a></td>
				<td>{{$product->category->name}}</td>
				<td>{{$product->price}}</td>
				<td class="edit">
				<a class="btn btn-small btn-info" href="{{ URL::to('product/' . $product->id . '/edit') }}">Edit</a>
				</td>
				<td>
				{{ Form::open(array('url' => 'product/' . $product->id)) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
					{{ Form::close() }}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div class="row">
	<a style="margin-bottom:10px;" href="{{ URL::to('category/create') }}" class="btn btn-primary">Add Catogorie</a>
	<br>
	<br>
</div>
<div class="row col-sm-5">
	<table id="holidays" class="table table-bordered">
	<thead class="thead-inverse">
		<tr>
			<th>Name</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($categories as $category)
		<tr>
			<td>{{$category->name}}</td>
			<td class="edit">
				<a class="btn btn-small btn-info" href="{{ URL::to('category/' . $category->id . '/edit') }}">Edit</a>
			</td>

			<td>
			{{ Form::open(array('url' => 'category/' . $category->id)) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>	
	

</div>
@endsection