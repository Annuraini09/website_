<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';
    protected $fillable = ['judul', 'deskripsi', 'date', 'foto'];

    // Relasi: Satu activity memiliki banyak member
    public function members()
    {
        return $this->hasMany(Member::class, 'activity_id');
    }
}