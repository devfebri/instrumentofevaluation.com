<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaNilai extends Model
{
    use HasFactory;

    protected $table='mahasiswa_nilai';
    protected $fillable=['skor'];
}
