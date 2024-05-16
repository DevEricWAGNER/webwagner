<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'logo',
        'email',
        'phone',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'horaires',
        'adresse',
        'use_phone',
        'use_email',
        'use_address',
        'accroche',
        'codePostal',
        'ville',
        'pays',
    ];


    protected $table = 'site_infos';

    public function keywords()
    {
        return $this->hasMany(Keyword::class);
    }
}
