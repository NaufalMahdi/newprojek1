<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    // app/Models/Artikel.php
    protected $fillable = ['judul', 'konten', 'gambar'];
}
