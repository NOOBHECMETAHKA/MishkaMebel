<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'beds';
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
    public static $typeBed = [
        "Двуспальная",
        "Односпальная"
    ];
    public function bed_bases(){
        return $this->hasOne(BedBase::class, 'id', 'beds_bases_id');
    }
    public function materials(){
        return $this->hasOne(Material::class, 'id', 'beds_materials_id');
    }
    public function furniture_sizes(){
        return $this->hasOne(FurnitureSize::class, 'id', 'bed_furniture_sizes_id');
    }
}
