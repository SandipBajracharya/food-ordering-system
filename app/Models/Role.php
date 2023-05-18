<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}

// pivot
// shops and products

// pivot table - primary key of shops and pk for product
// attach and sync eloquent

