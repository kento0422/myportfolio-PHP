<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_name',
        'contact_person',
        'phone',
        'email',
        'note',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}