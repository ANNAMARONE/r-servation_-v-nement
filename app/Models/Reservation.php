<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   
    use HasFactory;
    protected $fillable = [
        'statut',
        // Autres champs fillable de votre modèle
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
    
}
