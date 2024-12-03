<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $timestamps = false;
    protected $fillable = ['name', 'year', 'times_sold', 'band_id'];

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'album_song');
    }
    public function bands()
    {
        return $this->belongsTo(Band::class);
    }
}
