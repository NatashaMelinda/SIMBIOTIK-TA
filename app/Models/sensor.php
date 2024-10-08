<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sensor extends Model
{
    protected $fillable = ['nilai_suhu','nilai_pH','nilai_tds','nilai_tinggi'];
    protected $table= "tabel_sensor";
}