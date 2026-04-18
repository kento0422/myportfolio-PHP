<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'name',
        'status',
        'amount',
        'due_date',
        'note',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}