<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'description', 'note'];



    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}