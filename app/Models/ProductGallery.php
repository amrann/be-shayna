<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'product_id', 'photo', 'is_default'
  ];

  // variable ini diperuntukkan jika terdapat variable yang tidak ingin dimunculin
  protected $hidden = [

  ];

  // ==============================================================================
  // kumpulan relasi Product terhadap table yang lain

  public function product() {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }

  // Assesor untuk mengganti url foto
  public function getPhotoAttribute($value)
  {
    return url('storage/' . $value);
  }
}
