<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Satu foto dimiliki oleh satu album
    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}