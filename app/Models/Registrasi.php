<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "registrasi";
    protected $primaryKey = 'id_registrasi';
    public $timestamps = false;

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
    }
}
