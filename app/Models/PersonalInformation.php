<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'personal_information';

    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
}
