<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'song_id', 
        'user_id',
    ];

    /**
     * Get the song associated with this history.
     */
    public function song()
    {
        return $this->belongsTo(Song::class);
    }

    /**
     * Get the user associated with this history.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
