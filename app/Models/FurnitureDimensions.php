<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureDimensions extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'furniture_dimensions';

    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];

}
