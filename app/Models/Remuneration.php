<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remuneration extends Model
{
    use HasFactory;

    //définir table
    protected $table = 'remunerations';

    protected $fillable = [
        'intervenant_id',
        'projet_id',
        'role',
        'montant',
        'type_remuneration'
    ];

    public function intervenant()
    {
        return $this->belongsTo(Intervenants::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
