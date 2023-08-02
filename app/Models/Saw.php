<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saw extends Model
{
    use HasFactory;
    protected $table = 'saw';
    protected $fillable = ['b_c1', 'b_c2', 'b_c3', 'b_c4', 'b_c5', 'kode'];
    protected $guarded = [];
    public $timestamps = false;
}
