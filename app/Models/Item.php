<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'family_id',
        'has_childs',
        'description',
        'release',
        'height_picture',
        'width_picture',
    ];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function series()
    {
        return $this->hasMany(Serie::class);
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
