<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangePassword extends Model
{
    use HasFactory;

    public $table = 'change_password';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email_user',
        'id_user',
        'user_or_lib',
        'used'
    ];

    public $timestamps = false;
}
