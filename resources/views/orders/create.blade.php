@extends('adminlte::page')
@section('title','Order')
@section('content_header')
  <h1>Create New Order</h1>
@endsection
@section('content')
  <form class="col-md-6" action="{!! route('order.store') !!}" method="post">
    @csrf
    <div class="form-group">
      <select class="form-control select2" id="item_picker">
        <option disabled selected>Select Item</option>
        @foreach ($products as $product)
          <option value="{{ $product->id }}" price="{{ $product->price }}" quantity="{{ $product->quantity }}" image="{{ $product->image }}">{{ $product->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <table class="table">
        <thead id="container_header" style="display:none;">
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Image</th>
          <th>Remove</th>
        </thead>
        <tbody id="items_container">
        </tbody>
      </table>
    </div>
    <div class="form-group">
      <label>Adress</label>
      <input type="text" name="address" class="form-control" @if(isset($address) && Auth::user()->role > 0) value="{{$address->address}}" @endif>
    </div>
    <div class="form-group">
      <select class="form-control" name="delivery_id">
        <option selected disabled>Select Delivery</option>
        @foreach ($deliveries as $delivery)
          <option value="{{ $delivery->id }}">{{ $delivery->name }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
@section('js')
  <script>
    $(document).ready(function(){
      var items = 0;
      $("#item_picker").change(function(){
        items++;
        $("#container_header").show();
        var price = $(this).find(":selected").attr('price');
        var quantity = $(this).find(':selected').attr('price');
        var name = $(this).find(":selected").text();
        var id = $(this).val();
        var image = $(this).find(':selected').attr('image');
        if(!$("#row"+id).length){
          $("#items_container").append(`
            <tr id="row`+id+`">
            <td>`+name+`</td>
            <td>`+price+`</td>
            <td><input type="number" name="quantity[]" value="1" class="col-md-6" min="1"></td>
            <td><img src="`+image+`" alt="Product Image" height="100" width="100"></td>
            <td><input type="hidden" name="id[]" value="`+id+`" min="1"></td>
            <td><input type="hidden" name="price[]" value="`+price+`"></td>
            <td><button type="button" class="btn btn-danger btn-sm" id="remove`+id+`">X</button></td>
            </tr>
            `);
        }
            console.log(items);
            $("#remove"+id).on('click',function(){
              setTimeout(function(){
              items--;
              },1000);
              console.log(items);
              $("#row"+id).remove();
              if(items = 0){
                $("#container_header").hide();
              }
            });
      });
    });
  </script>
@endsection
