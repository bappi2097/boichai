<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'symbol',
    ];

    /**
     * Many to many relation between currency book
     *
     * @return \App\Models\Book
     */
    public function books()
    {
        return $this->belongsToMany(Book::class)->withPivot('amount');
    }
}
