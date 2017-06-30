@extends('layouts.master')

@section('content')




{{ Form::model($category, array('route' => array('category.update', $category->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
 {{ Form::submit('Edit!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
@endsection
