@extends('adminlte::page')
@section('title','ALl Products')
@section('content_header')
  <h1>All Products</h1>
@endsection
@section('content')
  <table class="datatable">
    <thead>
      <th>Name</th>
      <th>Price</th>
      <th>Qunatity</th>
      <th>Expiration Date</th>
      <th>Discount</th>
      <th>Actions</th>
    </thead>
    <tbody>
      @foreach ($products as $product)
        <tr>
          <td>{{ $product->name }}</td>
          <td>{{ $product->price }}</td>
          <td>{{ $product->quantity }}</td>
          <td>{{ $product->expiration_date }}</td>
          <td>{{ ($product->discount)?? 'No Discount'}}</td>
          <td>
            <form action="{!! route('product.delete') !!}" method="post" delete="delete{{$product->id}}" class="delete{{$product->id}}">
              @csrf
              <a href="{!!route('product.edit',$product->id)!!}" class="btn btn-primary btn-sm">Edit</a>
              <a href="{!! route('product.show',$product->id) !!}" method="post" class="btn btn-success btn-sm">Show</a>
              <input type="hidden" name="id" value="{{ $product->id }}">
              <button type="button" class="btn-danger btn delete btn-sm">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
