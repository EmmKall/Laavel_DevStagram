<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable= [
        'user_id',
        'post_id',
        'comentario'
    ];
    /**
     * Function to relations
     * One belongsTo one
     */
    public function post()
    {
    return $this->belongsTo( Post::class );
    }
    /**
     * Function to relations
     * one belongsTo one
     */
    public function user()
    {
        return $this->belongsTo( User::class );
    }

}
