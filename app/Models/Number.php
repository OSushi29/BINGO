<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    protected $table = 'numbers';
    public $timestamps = false;
    protected $fillable = ['number', 'selected'];
}
