<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProdi extends Model
{
    use HasFactory;
    protected $table = 'data';
    protected $guarded = [];
    public $timestamps = false;
}
