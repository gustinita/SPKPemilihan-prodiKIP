<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datakip extends Model
{
    use HasFactory;
    protected $table = 'data_kip';
    protected $guarded = [];
    public $timestamps = false;
}
