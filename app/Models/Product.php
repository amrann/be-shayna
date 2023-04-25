<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'type', 'description', 'price', 'slug', 'quantity'
    ];

    // variable ini diperuntukkan jika terdapat variable yang tidak ingin dimunculin
    protected $hidden = [

    ];

    // ==============================================================================
    // kumpulan relasi Product terhadap table yang lain

    public function galleries() {
        
    }
}
