<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function students(){
        return $this->hasMany(Teacher::class);
    }

    public function teachers(){
        return $this->hasMany(Student::class);
    }
}
