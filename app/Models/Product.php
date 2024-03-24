<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'products';
    protected $hidden = [
        'url_name',
        'created_at',
        'updated_at',
    ];
    public static $guarantee = [
        'Нету гарантии',
        '3 месяца',
        '1 год',
        '2 года',
        '3 года',
        '5 лет',
    ];
    public static $category = [
        'mattresses' => 'Матрасы',
        'mattress-covers' => 'Чехолы',
        'beds' => 'Кровати',
        'furniture-storage' => 'Хранилища вещей',
        'tables' => 'Столы',
    ];
    public function photos(){
        return $this->hasMany(Photo::class, 'product_photo_id','id');
    }
    public function discounts(){
        return $this->belongsTo(Discount::class, 'id', 'discounts_product_id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
