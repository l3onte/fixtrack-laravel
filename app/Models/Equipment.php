<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = ['name', 'model', 'serial_number', 'status'];

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class);
    }
}
