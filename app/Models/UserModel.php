<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    
    protected $fillable = [
        'nama',
        'npm',
        'kelas_id',
        'foto',
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function getUser($id = null) {
        if ($id != null) {
            return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                        ->select('user.*', 'kelas.nama_kelas')
                        ->where('user.id', $id) 
                        ->first(); 
        } else {
            return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                        ->select('user.id', 'user.nama', 'user.npm', 'user.foto', 'kelas.nama_kelas')
                        ->get();
        }
    }
}