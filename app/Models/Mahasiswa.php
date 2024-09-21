<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = "mahasiswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'kelas_id',
        'nim',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'edit'
    ];

    public $timestamps = true;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id'); 
    }
}
