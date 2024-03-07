<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Importe o modelo User

class UserTimeLog extends Model
{
    use HasFactory;

    // Define o relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Campos que podem ser atribuídos em massa
    protected $fillable = [
        'user_id',
        'entrada',
        'saida'
    ];
}
