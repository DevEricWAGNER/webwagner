<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'group_id', 'is_group', 'backoffice_color', 'ordre', 'link', 'top_actif'];

    public function group()
    {
        return $this->belongsTo(Menu::class, 'group_id');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'group_id');
    }
}