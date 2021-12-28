<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'imdbID',
        'title',
        'released',
        'runtime',
        'genre',
        'director',
        'writer',
        'actors',
        'plot',
        'language',
        'country',
        'awards',
        'poster',
        'imdbRating',
        'type',
        'boxoffice',
    ];

    /**
     * The users that watched the movie.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'movie_user');
    }
}
