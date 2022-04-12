<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdEntrega extends BaseModel 
{
    use HasFactory;

    protected $guarded = [];

    public function equipe_md()
    {
        return $this->hasMany(EquipeMedidor::class);
    }
    
    public function equipe()
    {
        return $this->belongsTo(EstruturaEquipe::class, 'equipe_id', 'id');
    }

}
