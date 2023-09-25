<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculacion extends Model
{
    use HasFactory;

    protected $table = 'matriculaciones';

    protected $fillable = [
        'curso_id',
        'alumno_id',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumnos::class);
    }

    public function curso()
    {
        return $this->belongsTo((Cursos::class));
    }
}
