<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    public $table = 'library';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'cnpj',
        'endereco',
        'cidade',
        'uf',
        'bairro',
        'numero',
        'email',
        'fone',
        'cep',
        'valida',
        'password'
    ];
}
