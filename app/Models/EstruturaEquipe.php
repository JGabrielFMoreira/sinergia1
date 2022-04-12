<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstruturaEquipe extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    
    public function encarregado()
    {
        return $this->belongsTo(EstruturaEncarregado::class, 'fiscal_id', 'id' );
    }

    
    public function supervisor()
    {
        return $this->belongsTo(EstruturaSupervisor::class);
    }

    public function medidores()
    {
        return $this->hasMany(MdEntrega::class);
    }

    public function ramals()
    {
        return $this->hasMany(EquipeRamal::class);
    }


}
