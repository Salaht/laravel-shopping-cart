@extends('layouts.master')

@section('content')


<form action="{{route('category.store')}}" method="POST" role="form">
	<legend>Form title</legend>

	<div class="form-group">
		<label for="">label</label>
		<input type="text" name="name" class="form-control" id="" placeholder="Input field">
	</div>
	{{ csrf_field() }}
	<button type="submit" class="btn btn-primary">Create</button>
</form>




@endsection
