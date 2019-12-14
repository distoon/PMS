@extends('adminlte::page')
@section('title','All Orders')
@section('content_header')
  <h1>All Orders</h1>
@endsection
@section('content')
  <table class="table datatable">
    <thead>
      <th>#</th>
      <th>User Name</th>
      <th>Total Price</th>
      <th>State</th>
      <th>Actions</th>
    </thead>
    <tbody>
      @foreach ($orders as $index => $order)
        <tr>
          <td>{{ $index+1 }}</td>
          <td>{{ $order->user->name }}</td>
          <td>{{ $order->total_price }}</td>
          <td>{{ $order->state }}</td>
          <td>
            <form action="{!! route('product.delete') !!}" method="post" delete="delete{{$order->id}}" class="delete{{$order->id}}">
              @csrf
              <a href="{!!route('product.edit',$order->id)!!}" class="btn btn-primary btn-sm">Edit</a>
              <a href="{!! route('product.show',$order->id) !!}" method="post" class="btn btn-success btn-sm">Show</a>
              @if ($order->state == 0)
                <a href="#" class="btn btn-warning btn-sm">Deliver</a>
              @endif
              @if ($order->state == 1)
                <a href="#" class="btn btn-warning btn-sm">Finish</a>
              @endif
              <input type="hidden" name="id" value="{{ $order->id }}">
              <button type="button" class="btn-danger btn delete btn-sm">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
