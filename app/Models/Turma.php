<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'ano_letivo'];

    public function materiais()
    {
        return $this->hasMany(MaterialDidatico::class, 'turma_id');
    }
}
