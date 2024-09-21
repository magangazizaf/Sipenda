<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kelas extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = "kelas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'name',
        'jumlah'
    ];

    public $timestamps = true;

    public function dosens()
    {
        return $this->hasMany(Dosen::class, 'kelas_id');
    }

    public function waliKelas()
    {
        return $this->hasOne(Dosen::class, 'kelas_id','id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'kelas_id'); 
    }
}
