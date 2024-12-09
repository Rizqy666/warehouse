<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'activity',
        'description',
        'logged_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
