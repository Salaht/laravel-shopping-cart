@extends('layouts.master')

@section('content')


{{ Form::model($product, array('route' => array('product.update', $product->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('title', 'title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>
     <div class="form-group">
        {{ Form::label('description', 'description') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
            <label for="category" class="control-label">category:</label>
              <select class="form-control" id="category" name="category">
                @foreach ($categories as $category)
                @if($category->name == $product->category->name)
                  <option selected value="{{$category->id}}">{{$category->name}}</option>
                @else
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach
            </select>
          </div>

     <div class="form-group">
        {{ Form::label('imagePath', 'imagePath') }}
        {{ Form::text('imagePath', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('price', 'price') }}
        {{ Form::text('price', null, array('class' => 'form-control')) }}
    </div>
 {{ Form::submit('Edit!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection
