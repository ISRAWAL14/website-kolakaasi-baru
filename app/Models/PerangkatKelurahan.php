<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatKelurahan extends Model
{
    use HasFactory; // <-- TAMBAHKAN BARIS INI

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = []; // <-- DAN TAMBAHKAN BLOK INI
}