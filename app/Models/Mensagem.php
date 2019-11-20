<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    /**
     * Tabela associada a model.
     *
     * @var string
     */
    protected $table = 'mensagens';

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
        'contato_id',
        'descricao'
    ];

    public function contato()
    {
        return $this->belongsTo(Contato::class,'contato_id');
    }
}
