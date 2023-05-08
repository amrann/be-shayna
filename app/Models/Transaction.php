<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
  use HasFactory;

  protected $fillable = [
    'uuid', 'name', 'email', 'number', 'address', 'transaction_total', 'transaction_status'
  ];

  // variable ini diperuntukkan jika terdapat variable yang tidak ingin dimunculin
  protected $hidden = [

  ];

  public function fundetails()
  {
    return $this->hasMany(TransactionDetail::class, 'transactions_id');
  }
}
