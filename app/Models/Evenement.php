<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Evenement extends Model
{
    protected $fillable = [
        'nom_evenement', 'image', 'date', 'lieu', 'description', 'nbr_place', 'date_limite','organisme_id'
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class)->where('statut', 'accepter');
    }
    public function organisme()
{
    return $this->belongsTo(Organisme::class);
}

    protected $dates = ['date', 'date_limite']; // Définit les colonnes qui sont des champs de date

    // Mutateurs pour les dates
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value); // Convertit et définit la valeur de date avec Carbon
    }

    public function setDateLimiteAttribute($value)
    {
        $this->attributes['date_limite'] = Carbon::parse($value); // Convertit et définit la valeur de date_limite avec Carbon
    }

    // Accesseurs pour les dates
    public function getDateAttribute($value)
    {
        return Carbon::parse($value); // Retourne la date convertie en objet Carbon lorsqu'elle est accédée
    }

    public function getDateLimiteAttribute($value)
    {
        return Carbon::parse($value); // Retourne la date_limite convertie en objet Carbon lorsqu'elle est accédée
    }
}
