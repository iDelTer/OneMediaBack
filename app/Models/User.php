<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Lists;
use App\Models\Liked;
use App\Models\CompletedMovie;
use App\Models\CompletedSerie;
use App\Models\CompletedGame;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function lists()
    {
        return $this->hasMany(Lists::class)->onDelete('cascade');
    }

    public function liked()
    {
        return $this->hasMany(Liked::class)->onDelete('cascade');
    }

    public function completedMovie()
    {
        return $this->hasMany(CompletedMovie::class)->onDelete('cascade');
    }

    public function completedSerie()
    {
        return $this->hasMany(CompletedSerie::class)->onDelete('cascade');
    }

    public function completedGame()
    {
        return $this->hasMany(CompletedGame::class)->onDelete('cascade');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class)->onDelete('cascade');
    }
}
