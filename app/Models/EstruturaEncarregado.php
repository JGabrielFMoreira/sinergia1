<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstruturaEncarregado extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function equipes()
    {
        return $this->hasMany(EstruturaEquipe::class, 'fiscal_id', 'id');
    }

    public function supervisor()
    {
        return $this->belongsTo(EstruturaSupervisor::class);
    }

}
