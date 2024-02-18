<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory;

    protected $guarded = false;
    public static $tableName = 'materials';
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
    public static $appointment = [
        "Набивка",
        "Материал",
    ];
    public function materials(){
        return $this->hasMany(Mattress::class, 'id', 'mattresses_materials_id');
    }
    public function furniture_sizes(){
        return $this->hasMany(FurnitureSize::class, 'id', 'mattresses_furniture_sizes_id');
    }
}
