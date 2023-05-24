<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table="mahasiswas"; // Eloquent akan membuat model mahasiswa menyimpan record di tabe mahasiswas
    public $timestamps=false;
    protected $primaryKey = 'nim'; // Memanggil isi DB dengan primarykey
    public $incrementing = false;

    /**
     * 
     * 
     * @var array
     */

     protected $fillable = [
        'nim',
        'nama',
        'kelas_id',
        'prodi',
        'jurusan',
        'no_hp',
    ];
}
