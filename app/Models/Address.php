<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'addresses';
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
}
