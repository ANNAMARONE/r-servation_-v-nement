<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisme extends Model
{
    use HasFactory;

    protected $fillable=[
        'description',
        'logo',
        'adresse',
        'secteur_activité',
        'nina',
        'user_id'

    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
