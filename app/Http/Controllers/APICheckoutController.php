<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use App\Http\Requests\APICheckoutRequest;
use App\Http\Controllers\Api\ResponseFormatter;

class APICheckoutController extends Controller
{
  public function checkout(APICheckoutRequest $request) {
    $data = $request->except('transaction_details'); // pengecualian utk transaction_details
    $data['uuid'] = 'TRX' . mt_rand(10000,99999) . mt_rand(100,999); // mt_rand itu generate random integer

    $transaction = Transaction::create($data); // membuat data transaction ke tabel Transaction

    foreach ($request->transaction_details as $t_d) {
      $ditels[] = new TransactionDetail ([
        'transactions_id' => $transaction->id,
        'products_id' => $t_d
      ]);
      Product::find($t_d)->decrement('quantity'); // mengurangi barang ketika pembeli success membeli barang
    }

    $transaction->fundetails()->saveMany($ditels); // menyimpan data relasi transaction

    return ResponseFormatter::success($transaction);
  }
}
