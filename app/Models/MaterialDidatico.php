<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialDidatico extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = [
        'titulo',
        'descricao',
        'arquivo',
        'turma_id',
        'status',
    ];

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }
}
