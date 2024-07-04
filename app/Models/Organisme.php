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
        'user_id',
        'statut'
    ];
    // Optional: Add a scope to filter active organismes
    public function scopeActive($query)
    {
        return $query->where('statut', 'activer');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function evenement(){
        return $this->hasMany(Evenement::class);
    }
}
