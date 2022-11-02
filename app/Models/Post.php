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
}
