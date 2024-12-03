<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $table = 'songs';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $timestamps = true;
    protected $fillable = ['title', 'singer'];

    public function albums()
    {
        return $this->belongsToMany(Album::class, 'album_song');
    }
}
