<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'book';
    protected $fillable = [
        'name_book',
        'author_book',
        'year_book',
        'book_type',
        'description',
        'image_book',
        'link'
    ];

    protected $hidden = [];
}
