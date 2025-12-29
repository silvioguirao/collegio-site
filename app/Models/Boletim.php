<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boletim extends Model
{
    use HasFactory;

    protected $table = 'boletins';

    protected $fillable = [
        'aluno_id',
        'periodo',
        'notas',
        'observacoes',
    ];

    protected $casts = [
        'notas' => 'array',
    ];

    public function aluno()
    {
        return $this->belongsTo(User::class, 'aluno_id');
    }
}
