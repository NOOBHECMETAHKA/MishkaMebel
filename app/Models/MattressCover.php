<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MattressCover extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'mattress_covers';
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
    public function mattress_fastenings(){
        return $this->hasOne(MattressFastening::class, 'id', 'mattress_fastenings_id');
    }
    public function furniture_sizes(){
        return $this->hasOne(FurnitureSize::class, 'id', 'mattress_covers_furniture_sizes_id');
    }
}
