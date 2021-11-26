<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavBook extends Model
{
    use HasFactory;

    public $table = 'fav_books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identification',
        'id_user',
        'user_or_lib',
        'api_or_db'
    ];

    public $timestamps = false;
}
