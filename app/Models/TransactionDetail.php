<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
  use HasFactory;

  protected $fillable = [
    'products_id', 'transactions_id'
  ];
  
  // variable ini diperuntukkan jika terdapat variable yang tidak ingin dimunculin
  protected $hidden = [

  ];

  public function funtransaction()
  {
    return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
  }

  public function funproduct()
  {
    return $this->belongsTo(Product::class, 'products_id', 'id');
  }
}
