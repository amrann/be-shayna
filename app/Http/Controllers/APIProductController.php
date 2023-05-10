<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Http\Controllers\Api\ResponseFormatter;

class APIProductController extends Controller
{
    public function all(Request $request) {
      $id = $request->input('id');
      $limit = $request->input('limit', 6);
      $name = $request->input('name');
      $slug = $request->input('slug');
      $type = $request->input('type');
      $price_from = $request->input('price_from');
      $price_to = $request->input('price_to');

      // api/products?id=2
      if ($id) {
        $product = Product::with('productGalleries')->find($id);
        // dd($product);
        if ($product) {
          return ResponseFormatter::success($product, 'Data produk berhasil');
        } else {
          return ResponseFormatter::error(null, 'Data not found', 404);
        }
      }

      if ($slug) {
        $product = Product::with('productGalleries')
          ->where('slug', $slug)
          ->first();

        if ($product) {
          return ResponseFormatter::success($product, 'Data produk berhasil');
        } else {
          return ResponseFormatter::error(null, 'Data not found', 404);
        }
      }

      $product = Product::with('productGalleries');

      if ($name)
        $product->where('name', 'like', '%' . $name . '%');
      if ($type)
        $product->where('type', 'like', '%' . $type . '%');
      if ($price_from)
        $product->where('price', '>=', $price_from);
      if ($price_to)
        $product->where('price', '=<', $price_to);

      return ResponseFormatter::success($product->paginate($limit), 'Data berhasil');
    }
}
