<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    /**
     * Tabela associada a model.
     *
     * @var string
     */
    protected $table = 'contatos';

    /**
     * Propriedade considerada não necessária em nossa aplicação, por isso inicia como false.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Atributos da model.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'sobrenome',
        'email',
        'telefone'
    ];

    public function mensagens()
    {
        return $this->hasMany(Mensagem::class,'contato_id','id');
    }
}
