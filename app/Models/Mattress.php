<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mattress extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'mattresses';
    public static $mattressType = [
        'Пружинные',
        'Беспружинные',
        'Кокосовые',
        'Латексные',
        'Ортопедические',
        'Детские матрасы',
        'С эффектом памяти',
        'Тонкие',
        'Топперы',
        'Для диванов',
        'Круглые',
        'Трансформируемые',
    ];
    public static $ageСategory = [
      "Детский", "Взрослый"
    ];
    public static $hardness = [
        "Жёсткий",
        "Средней жётскости",
        "Мягкие",
        "С разной жёсткостью сторон"
    ];
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];

    public function materials(){
        return $this->hasOne(Material::class, 'id', 'mattresses_materials_id');
    }

    public function furniture_sizes(){
        return $this->hasOne(FurnitureSize::class, 'id', 'mattresses_furniture_sizes_id');
    }
}
