<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['nom', 'prenom', 'fonction', 'telephone', 'email', 'entreprise_id','commentaire_id'];
    protected $guarded = ['id'];
    public $timestamps = true;

    use HasFactory;

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaires::class);
    }
}
