<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $fillable = ['room_id', 'name', 'phone', 'address', 'created_at', 'remark', 'status'];

    public $timestamps = false;

    public function room(){
        return $this->belongsTo(RoomModel::class, 'room_id', 'id');
    }
}