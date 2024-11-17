<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'gender', 'birthday', 'status_active',
    ];

    protected $casts = [
        'status_active' => 'boolean',
    ];
}
