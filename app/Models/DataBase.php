<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBase extends Model
{
    use HasFactory;

    protected $table = 'data_base';

    protected $fillable = [
        'descricao', 'host', 'port', 'base'
    ];
}
