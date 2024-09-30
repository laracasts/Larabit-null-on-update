<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'user_id'
    ];

    public function manager(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
