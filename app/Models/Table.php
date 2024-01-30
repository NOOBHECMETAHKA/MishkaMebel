<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'tables';

    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
}
