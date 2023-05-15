<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    // protected $primaryKey = 'id';
    // protected $keyType = 'int';
    
    protected $fillable = [
        'nim',
        'nama',
        'prodi_id',
        'kelas_id',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'hp'
    ];

    // public function prodi(){
    //     return $this->belongsTo(ProdiModel::class, 'prodi_id', 'prodi_id');
    // } 

    // public function kelas(){
    //     return $this->belongsTo(Kelas::class);
    // } 

    // public function mahasiswa_matakuliah()
    // {
    //     return $this->hasMany(Mahasiswa_MataKuliah::class);
    // }

}
