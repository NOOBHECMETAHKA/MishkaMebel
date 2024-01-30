<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MattressFastening extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'mattress_fastenings';

    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
}
