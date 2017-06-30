@extends('layouts.master')

@section('content')


<form action="{{route('product.store')}}" method="POST" role="form">
	<legend>Form title</legend>

	<div class="form-group">
		<label for="">Title</label>
		<input type="text" name="title" class="form-control" id="" placeholder="Input field">
	</div>


	<div class="form-group">
  		<label for="description">description</label>
  		<textarea class="form-control" rows="5" id="" name="description"></textarea>
	</div>

	 <div class="form-group">
            <label for="category" class="control-label">category:</label>
              <select class="form-control" id="category" name="category">
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
          </div>

    <div class="form-group">
	<label for="">imagePath</label>
	<input type="text" name="imagePath" class="form-control" id="" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">price</label>
		<input type="text" name="price" class="form-control" id="" placeholder="Input field">
	</div>
	{{ csrf_field() }}
	<button type="submit" class="btn btn-primary">Create</button>
</form>




@endsection
