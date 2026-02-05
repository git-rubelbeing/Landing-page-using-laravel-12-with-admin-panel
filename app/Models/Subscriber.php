<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'ip_address',
        'user_agent',
        'subscribed_at',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'subscribed_at' => 'datetime',
    ];
}
