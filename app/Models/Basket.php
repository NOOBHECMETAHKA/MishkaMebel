<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Decimal;

class Basket extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'baskets';
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
}
