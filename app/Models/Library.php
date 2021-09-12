<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Library extends Authenticatable
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
