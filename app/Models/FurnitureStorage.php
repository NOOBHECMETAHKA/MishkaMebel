<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureStorage extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'furniture_storages';
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
    public static $type = [
        'Шкаф',
        'Тумбочка',
        'Комод',
        'Стелаж',
        'Полка'
    ];
    public function furniture_dimensions(){
        return $this->hasOne(FurnitureDimensions::class, 'id', 'furniture_storages_furniture_dimensions_id');
    }
}
