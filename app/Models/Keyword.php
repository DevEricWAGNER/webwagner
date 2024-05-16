<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keyword extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'site_info_id'];

    public function siteInfo()
    {
        return $this->belongsTo(SiteInfo::class);
    }
}