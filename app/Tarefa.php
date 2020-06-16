<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    //protected $table = 'tarefas'; //se não informar, ele assume tarefas
    //protected $primaryKey = 'id'; //se não informar, ele assume id
    //public $incrementing = true;
    //protected $keyType = 'string';

    //IGNORAR O created_at e update_at:
    public $timestamps = false;
    //PREENCHIMENTO EM MASSA
    protected $fillable = ['titulo'];

    //SE QUISER MUDAR O NOME DO CAMPO:
    //const CREATED_AT = 'date_created'; //nome do campo
    //const UPDATE_AT = 'date_updated'; //nome do campo




}
