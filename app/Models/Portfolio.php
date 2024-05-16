<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
        'time_worked',
    ];



    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
