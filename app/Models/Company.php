<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cnpj'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
