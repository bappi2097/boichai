<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'local_name',
        'code',
    ];

    /**
     * Many to many relation between language book
     *
     * @return \App\Models\Book
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
