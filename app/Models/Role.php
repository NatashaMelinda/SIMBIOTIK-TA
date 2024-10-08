<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Definisikan relasi ke model User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}