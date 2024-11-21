<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $imdb_id
 * @property string|null $released
 * @property string|null $imdb_rating
 * @property int|null $imdb_votes
 * @property int $search_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $poster
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie whereImdbId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie whereImdbRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie whereImdbVotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie wherePoster($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie whereReleased($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie whereSearchCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Movie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Movie extends Model
{
    use HasFactory;

    // Add the fillable properties
    protected $fillable = [
        'id',        // Allow mass assignment for the id field
        'title',     // Updated to allow mass assignment for the title field
        'search_count', // Allow mass assignment for the search_count field
    ];
}
