<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "jurusan";
    protected $primaryKey = 'id_jurusan';
    public $timestamps = false;

    public function registrasi()
    {
        return $this->hasMany(Nilai::class, 'id_jurusan', 'id_jurusan');
    }
}
