<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'director',
        'age',
        'year',
        'release_date',
        'price',
        'description'
    ];

    public function tickets(){
        return $this->hasMany(Ticket::class);

    }
}
