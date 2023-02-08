<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Commentaires extends Model
{
    use HasFactory;

    protected $fillable = ['commentaire', 'contact_id'];

    public function up()    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->string('commentaire');
            $table->string('contact_id');
            $table->timestamps();
        });
    }

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function replies(){
        return $this->hasMany(Commentaires::class, 'parent_id');
    }
}
