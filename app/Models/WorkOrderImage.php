<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class WorkOrderImage extends Model
{
    use HasUuids;

    protected $fillable = [
        'work_order_id',
        'file_path',
        'type',
        'latitude',
        'longitude'
    ];

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class);
    }
}