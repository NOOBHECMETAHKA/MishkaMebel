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
}
