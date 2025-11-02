<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Listing extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    // filter incoming data
    protected function scopeFilter($query, array $filters)
    {
        // check if 'tag' != null ie: the filterting tag in the params
        if ($filters['tag'] ?? false) {
            // filter it with data alike in 'Tags' col in the DB
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }

            // check if 'search' != null ie: the filterting tag in the params
        if ($filters['search'] ?? false) {
            // filter it with data alike in 'Tags' col in the DB
            $query->where('tags', 'like', '%' . $filters['search'] . '%');
        }
    }
}
