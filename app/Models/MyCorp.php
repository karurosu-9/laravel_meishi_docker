<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCorp extends Model
{
    use HasFactory;
    protected $table = 'my_corp';
    public $timestamps = false;
}
