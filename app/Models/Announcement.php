<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'message_text',
        'start_date',
        'end_date'
    ];
}
