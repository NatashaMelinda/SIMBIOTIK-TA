<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phair extends Model
{
    protected $fillable = ['nilai_pH'];
    protected $table= "nilaiphair";
}