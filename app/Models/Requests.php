<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Requests extends Model
{
    use HasFactory, Notifiable;

    protected $table = "request";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'kelas_id',
        'mahasiswa_id',
        'keterangan'
    ];

    public $timestamps = true;
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
