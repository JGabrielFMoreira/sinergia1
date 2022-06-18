<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends BaseModel 
{
    protected static function booted()
    {

        $usuario =  auth()->user();

        if ($usuario->categoria_id === 2) {
            static::addGlobalScope('user_id', function (Builder $builder) {
                $builder->where('responsavel_id', auth()->id());
            });
        };

        if ($usuario->categoria_id === 3) {
            static::addGlobalScope('user_id', function (Builder $builder) {
                $builder->where('responsavel_id', auth()->id());
            });
        };

        if ($usuario->categoria_id === 6) {
            static::addGlobalScope('user_id', function (Builder $builder) {
                $builder->where('status', 'RETORNO');
            });
        };
        
    }

   



    
    use HasFactory;
    protected $guarded = [];

    public function codigo()
    {
        return $this->belongsTo(Codigo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'responsavel_id', 'id');
    }

    public function user_lancador()
    {
        return $this->belongsTo(User::class, 'lancado_por_id', 'id');
    }

}
