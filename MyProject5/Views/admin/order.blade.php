@extends('layout.master')

@section('title', 'Order Table')

@section('content')


<div class="container mt-5">
	<table class="table">
		<thead class="thead-dark">
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Address</th>
		    </tr>
		</thead>

		<tbody class="bg-white">
			@foreach($rows as $row)
			    <tr>
			      <td><a href="{{ $baseur }}/admin/orderDetail?id=<?php echo $row->id ?>">{{ $row->name }}</a></td>
			      <td>{{ $row->email }}</td>
			      <td>{{ $row->phone }}</td>
			      <td>{{ $row->address }}</td>
			    </tr>
		    @endforeach
		</tbody>
	</table>
</div>



@endsection