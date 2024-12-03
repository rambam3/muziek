<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;
    protected $table = 'bands';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $timestamps = true;
    protected $fillable = ['name','genre', 'founded', 'active_till', 'band_id'];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
