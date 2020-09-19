<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public static function getCartData($session_id) {
        $cart_datas = DB::table('carts')
            ->select(
                'carts.id',
                'carts.session_id',
                'carts.product_name',
                'carts.product_code',
                'carts.product_size',
                'carts.quantity',
                'carts.product_id',
                'product_attributes.price',
                'products.image'
            )
            ->leftJoin('products', 'products.id', '=', 'carts.product_id')
            ->leftJoin('product_attributes', function($join) {
                $join->on('product_attributes.product_id', '=', 'products.id')
                    ->on('product_attributes.size', '=', 'carts.product_size');
            })
            ->where('carts.session_id', $session_id)
            ->get()->toArray();

        return $cart_datas;
    }
}
