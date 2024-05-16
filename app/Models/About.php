<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'title',
        'first_img',
        'first_content',
        'second_content',
        'second_img',
        'video_link',
    ];

}