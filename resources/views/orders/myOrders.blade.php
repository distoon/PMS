@extends('adminlte::page')
@section('title','My Orders')
@section('content_header')
  <h1>My Orders</h1>
@endsection
@section('content')
  <table class="table datatable">
    <thead>
      <th>#</th>
      <th>Total Price</th>
      <th>Address</th>
      <th>Created At</th>
      <th>Actions</th>
    </thead>
    @foreach ($orders as $index => $order)
      <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $order->total_price }}</td>
        <td>{{ $order->address }}</td>
        <td>{{ $order->created_at }}</td>
        <td>
          <form  action="" method="post">
            <a href="#" class="btn btn-primary btn-sm">Edit</a>
            <a href="#" class="btn btn-success btn-sm">Show</a>
            <button type="button" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
