<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // Fungsi helper yang dibawa Laravel

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
  public function index()
  {
      $items = Product::all();

      return view('pages.products.index')->with([
          'items' => $items
      ]);
  }

  public function create()
  {
      return view('pages.products.create');
  }

  
  public function store(ProductRequest $request)
  {
    $data = $request->all(); // Semua validasi dari request berada dalam ProductRequest yak
    $data['slug'] = Str::slug($request->name); // terkait slug STR ini, bisa baca di dokumentasi laravelnya langsung

    Product::create($data);
    return redirect()->route('products.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
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
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
