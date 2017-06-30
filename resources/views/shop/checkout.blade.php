@extends('layouts.master')

@section('title')
Webshop
@endsection

@section('content')
<div class="row">
	<div class="col-sm-6 col-md-6 col-md-offset-4 col-sm-offset-4">
		<h1>Checkout</h1>
		<h4>Your Total: ${{ $total }}</h4>
		<form action="{{ route('checkout') }}" method="POST" id="checkout-form">
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="name">Full Name:</label>
						<input type="text" name="name" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-12">
					
					<div class="form-group">
						<label for="name">Email Address:</label>
						<input type="text" name="email" class="form-control" required>
					</div>
					
				</div>
				<div class="col-xs-12">
					<div class="form-group">
						<label for="name">Country:</label>
						<input type="text" name="country" class="form-control" required>
					</div>
				</div>
				<div class="col-xs-8">
					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" name="address" class="form-control" required>
					</div>
				</div>
				
				<div class="col-xs-4">
					<div class="form-group">
						<label for="name">Zip Code</label>
						<input type="text" name="zip-code" class="form-control" required>
					</div>
				</div>
			</div>
			{{csrf_field()}}
			<button type="submit" class="btn btn-success">Buy now</button>
		</form>
	</div>            	 
</div>
@endsection