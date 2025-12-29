<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionProcess extends Model
{
    use HasFactory;

    protected $fillable = ['year','steps','requirements','link'];
    protected $casts = ['steps' => 'array'];
}
