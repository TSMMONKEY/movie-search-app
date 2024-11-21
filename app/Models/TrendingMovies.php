<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrendingMovies extends Model
{
    use HasFactory;

    // Add the fillable properties
    protected $fillable = [
        'imdb_id',
        'search_count',
        'title',
    ];
}
