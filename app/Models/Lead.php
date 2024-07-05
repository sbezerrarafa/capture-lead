<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'hash_lista', 'nome', 'telefone', 'endereco', 'setor', 'lista_nome', 'rating', 'website', 'url', 'latitude', 'longitude'
    ];

    public function campanhas()
    {
        return $this->hasMany(Campanha::class);
    }

    public function groupedLeads()
    {
        return $this->hasMany(Lead::class, 'lead_id','hash_lista');
    }
}
