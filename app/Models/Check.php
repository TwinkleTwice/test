<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'user_id',
        'type',
        'code',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
