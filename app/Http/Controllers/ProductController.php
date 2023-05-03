<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // Fungsi helper yang dibawa Laravel

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductGallery;

class ProductController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
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

  public function edit($id)
  {
    $item = Product::findOrFail($id);
    // FindOrFail => ketika data gk ada maka langsung 404
    // Find => ketika data gk ada maka error
    return view('pages.products.edit')->with([
      'item' => $item
    ]);
  }

  public function update(ProductRequest $request, $id)
  {
    $data = $request->all();
    $data['slug'] = Str::slug($request->name);

    $item = Product::findOrFail($id);
    $item->update($data);

    return redirect()->route('products.index');
  }

  public function destroy($id)
  {
    $item = Product::findOrFail($id);
    $item->delete();

    // ketika produk dihapus, gambar yang berelasi dgn produk ikut juga terhapus
    ProductGallery::where('product_id', $id)->delete();

    return redirect()->route('products.index');
  }

  public function gallery(Request $request, $id)
  {
    $products = Product::findOrFail($id);
    $items = ProductGallery::with('product')
      ->where('product_id', $id)
      ->get();

    return view('pages.products.gallery')->with([
      'products' => $products,
      'items' => $items
    ]);
  }
}
