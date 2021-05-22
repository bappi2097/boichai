<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'isbn',
        'quantity',
        'dimention',
        'description',
        'publisher_name',
        'publication_date',
    ];

    /**
     * Many to many relation between book author
     *
     * @return \App\Models\Author
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    /**
     * Many to many relation between book currency
     *
     * @return \App\Models\Currency
     */
    public function prices()
    {
        return $this->belongsToMany(Currency::class)->withPivot('amount');
    }

    /**
     * Many to many relation between book language
     *
     * @return \App\Models\Language
     */
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
}
