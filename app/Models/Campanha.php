<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campanha extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'lead_id', 'nome', 'canal', 'status', 'conteudo'
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id', 'hash_lista');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
