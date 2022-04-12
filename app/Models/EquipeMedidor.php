<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipeMedidor extends BaseModel 
{
    use HasFactory;
    protected $guarded = [];

    public function entrega()
    {
        return $this->belongsTo(MdEntrega::class);
    }

    public function equipe()
    {
        return $this->belongsTo(EstruturaEquipe::class, 'equipe_id', 'id');
    }




}
