<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    use HasFactory;

    protected $table = 'product_attributes';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'product_id', 'size', 'price'];
}
