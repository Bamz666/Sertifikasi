<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "agama";
    protected $primaryKey = 'id_agama';
    public $timestamps = false;

    public function registrasi()
    {
        return $this->hasMany(Registrasi::class, 'id_agama', 'id_agama');
    }
}
