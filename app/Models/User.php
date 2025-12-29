<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
    public function turma()
    {
        return $this->belongsTo(\App\Models\Turma::class, 'turma_id');
    }
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /** Role helpers */
    public function isAdmin(): bool
    {
        return $this->role === 'administrador';
    }

    public function isPublisher(): bool
    {
        return $this->role === 'publicador';
    }

    public function isAluno(): bool
    {
        return $this->role === 'aluno';
    }

    public function isPublico(): bool
    {
        return $this->role === 'publico';
    }
}
