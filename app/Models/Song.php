<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'genres_id',
        'name',
        'song_path',
        'poster',
        'user_id',
        'views'
    ];

    /**
     * Get the full URL path for the icon.
     *
     * @param string $record
     * @return string
     */
    public static function getFullPath($record)
    {
        // Assuming your images are stored in the public directory
        
        // $basePath = config('app.url') . '/storage/';

        $basePath = env('APP_URL') . '/storage/';

        return $basePath . $record;
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function genres()
    {
        return $this->belongsTo(Genre::class, 'genres_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the likes for the song.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get the comments for the song.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the history of this song.
     */
    public function histories()
    {
        return $this->hasMany(SongHistory::class);
    }
}
