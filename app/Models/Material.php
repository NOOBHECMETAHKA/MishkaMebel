<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
