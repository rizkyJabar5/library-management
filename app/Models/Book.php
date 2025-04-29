<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Book extends Model
{
    use AsSource, Filterable, Chartable, HasFactory, Notifiable;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'description',
        'author',
        'isbn',
        'published_date',
        'genre',
        'pages',
        'language',
        'publisher'
    ];

    protected $casts = [
        'published_date' => 'date',
    ];
}
