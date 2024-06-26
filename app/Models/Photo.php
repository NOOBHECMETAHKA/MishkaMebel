<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $guarded = false;

    public static string $tableName = 'photos';
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];

    public function getImageUrlAttribute(){
        return url('storage/'.$this->link);
    }


}
