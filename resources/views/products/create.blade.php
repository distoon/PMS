@extends('adminlte::page')
@section('title','Add Product')
@section('content_header')
  <h1>Add New Product</h1>
@endsection
@section('content')
{{-- @include('error') --}}
  <form class="col-md-6" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label>Name</label>
          <input type="text" class="form-control" name="name" value="{{ old('name') }}">
      </div>
      <div class="form-group">
        <label>price</label>
        <input type="number" name="price" class="form-control" value="{{ old('price') }}">
      </div>
      <div class="form-group">
        <label>Expiration Date</label>
        <input type="text" name="expiration" class="datepicker form-control" value="{{ old('expiration') }}">
      </div>
      <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control">
      </div>
      <div class="form-group">
        <label>Discount</label>
        <input type="number" name="discount" class="form-control" value="{{old('discount')}}">
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" value="{{old('image')}}">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
@endsection
