<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderList extends Model
{
    use HasFactory;
    protected $guarded = false;

    public static $tableName = 'order_lists';
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
}
