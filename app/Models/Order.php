<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $guarded = false;
    public static $tableName = 'orders';
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at',
    ];
    public function order_lists(){
        return $this->hasMany(OrderList::class, 'order_order_list_id', 'id');
    }
    public function statuses(){
        return $this->belongsTo(Status::class, 'order_status_id', 'id');
    }

    public function addresses(){
        return $this->belongsTo(Address::class, 'order_address_id', 'id');
    }
}
