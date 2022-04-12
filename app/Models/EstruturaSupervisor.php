<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstruturaSupervisor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function encarregados()
    {
        return $this->hasMany(EstruturaEncarregado::class, 'supervisor_id', 'id');
    }

    public function equipes()
    {
        return $this->hasMany(EstruturaEquipe::class);
    }

}
