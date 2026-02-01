<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = [
        'equipment_id', 
        'user_id', 
        'title', 
        'description', 
        'priority', 
        'status', 
        'client_signature', 
        'completed_at', 
        'canceled_at'
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
