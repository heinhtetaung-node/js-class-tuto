@extends('layout.master')

@section('title', 'Order Detail')

@section('content')


<div class="container cat-list mt-5 mb-5">
	<h1>Hello World. Change the world</h1>

	<div class="inner-list productDetail">
		<p>Name: {{ $row->name }}</p>
		<i>Total: ${{ $row->total }}</i>
		<p>Order Date: {{ $row->order_date }}</p>

		@foreach($product as $pro)
			<p>Product Name: {{ $pro->title }}</p>
			<i>Unit Price: ${{ $pro->price}}</i>
			<p>Quantity: {{ $pro->qty }}</p>
		@endforeach
	</div>
</div>

@endsection