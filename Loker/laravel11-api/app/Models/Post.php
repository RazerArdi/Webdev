<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'location',
    ];

    /**
     * Get the location URL.
     *
     * @return Attribute
     */
    protected function location(): Attribute
    {
        return Attribute::make(
            get: fn($location) => url('/storage/locations/' . $location),
        );
    }
}
