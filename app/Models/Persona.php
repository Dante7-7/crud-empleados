<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Persona extends Model
{ 
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'lastname',
        'fecha_de_nacimiento',
        'email',
        'imagen',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($persona) {
            if ($persona->imagen) {
                Storage::disk('public')->delete($persona->imagen);
            }
        });
    }
}
