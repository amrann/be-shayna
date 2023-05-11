<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;

use App\Http\Controllers\Api\ResponseFormatter;

class APITransactionController extends Controller
{
  public function get(Request $request, $id) {
    $product = Transaction::with(['fundetails.funproduct'])->find($id);
    if ($product) {
      return ResponseFormatter::success($product, 'Data transaksi berhasil');
    } else {
      return ResponseFormatter::error(null, 'Data not found', 404);
    }
  }
}
