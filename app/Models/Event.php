<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_evento',
        'imagem_id',
        'status',
        'autor_id',
        'slug',
    ];

    protected $casts = [
        'data_evento' => 'datetime',
    ];

    public function imagem()
    {
        return $this->belongsTo(Image::class, 'imagem_id');
    }

    public function autor()
    {
        return $this->belongsTo(User::class, 'autor_id');
    }
}
