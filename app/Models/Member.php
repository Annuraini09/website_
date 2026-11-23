<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $fillable = ['name', 'jabatan', 'angkatan', 'kelas', 'jurusan', 'phone', 'foto', 'activity_id'];

    // Relasi: Member ini milik satu activity
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}