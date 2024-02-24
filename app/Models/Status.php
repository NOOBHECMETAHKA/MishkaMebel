<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Status extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'statuses';
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
