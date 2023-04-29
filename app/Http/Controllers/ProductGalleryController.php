<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductGalleryRequest;

use App\Models\Product;
use App\Models\ProductGallery;

class ProductGalleryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $items = ProductGallery::with('product')->get();

    return view('pages.product-galleries.index')->with([
      'items' => $items
    ]);
  }
}
