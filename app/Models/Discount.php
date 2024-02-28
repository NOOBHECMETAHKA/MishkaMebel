<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'discounts';
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
    public function products(){
        return $this->hasOne(Product::class, 'id', 'discounts_product_id');
    }
    public static function getSumDiscount(){
        $data = Product::with([Discount::$tableName])->get()->toArray();
        $sum = 0;

        if(count($data) != 0){
            foreach($data as $product){
                if($product['discounts'] != null)
                    $sum += $product['discounts']['percent'] * ($product['price'] / 100);
            }
        }

        return $sum;
    }
}
