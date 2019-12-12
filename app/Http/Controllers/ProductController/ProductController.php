<?php

namespace App\Http\Controllers\ProductController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Item::all();
        return view('products.all',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'name' => 'max:255|required|',
          'price' => 'numeric|integer|max:99999|required',
          'expiration' => 'date|required|',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'quantity' => 'required|numeric|max:99999:',
          'discount' => 'max:100',
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $image = Item::create([
          'name' => $request->name,
          'price' => $request->price,
          'expiration_date' => $request->expiration,
          'quantity' => $request->quantity,
          'discount' => $request->discount,
          'image' => $imageName,
        ]);
        return redirect(route('product.all'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Item::find($id);
      if(!$product)
        abort(404);
      else
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Item::find($id);
      if(!$product)
        abort(404);
      else
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $product = Item::find($id);
      if(!$product)
        abort(404);
      $request = $request->except('__token');
      $product->update($request);
      return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      Item::destroy($request->id);
      return redirect()->back()->with(['message'=>"The Item's been deleted successfuly"]);
    }
}
