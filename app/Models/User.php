<?php

namespace App\Models;

// use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{

    use HasFactory, Notifiable, HasRoles;

    // public function organisme()
    // {
    //     return $this->belongsTo(Organisme::class);
    // }
  
    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
    ];

    /**
     * Les attributs qui doivent être cachés pour la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui doivent être convertis à d'autres types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id');
    // }
    
    /**
     * Définition de la relation avec le modèle Organisme.
     * Un utilisateur peut avoir un organisme associé.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function organisme()
    {
        return $this->hasOne(Organisme::class);
    }
  
    
    /**
     * Définition de la relation avec le modèle Reservation.
     * Un utilisateur peut avoir plusieurs réservations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
} 
