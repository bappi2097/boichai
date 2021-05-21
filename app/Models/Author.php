<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'country_id',
    ];

    /**
     * Many to many relation between author book
     *
     * @return void
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    /**
     * country
     *
     * @return \App\Models\Country
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
