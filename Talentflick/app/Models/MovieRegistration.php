<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieRegistration extends Model
{
    use HasFactory;

    protected $table = 'movie_registrations';
    protected $fillable = [
        'user_name',
        'email',
        'phone_number',
        'date_of_birth',
        'gender',
        'movie_title',
        'movie_description',
        'movie_link_url'
    ];
}
