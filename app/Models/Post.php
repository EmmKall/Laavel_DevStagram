<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    /**
     * Funtion to relations belongsTo
     *  One post belongsTo one user
     */
    public function user()
    {
        return $this->belongsTo( User::class ); //Si solo queremos ciertos datos, los agregamos dentro de corchetes ->select( [ campo1, campo2 ] );
    }
    /**
     * Function to relation HashMany
     * Many has many
     */
    public function comentarios()
    {
        return $this->hasMany( Comentario::class );
    }
    /**
     * Function to relation 
     * HashMany
     */
    public function likes()
    {
        return $this->hasMany( Like::class );
    }

    public function checkLikes( User $user )
    {
        return $this->likes->contains( 'user_id', $user->id );
    }
}
