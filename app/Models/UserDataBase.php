<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDataBase extends Model
{
    use HasFactory;

    protected $table = 'user_data_base';

    protected $fillable = [
        'nome', 'senha'
    ];
}
