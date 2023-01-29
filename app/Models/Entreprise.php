<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $table = 'entreprises';
    protected $fillable = ['raison_sociale', 'adresse', 'telephone', 'groupe', 'secteur_activite'];
    protected $guarded = ['id'];
    public $timestamps = true;
    
    use HasFactory;

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
