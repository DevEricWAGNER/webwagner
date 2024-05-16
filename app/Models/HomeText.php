<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeText extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_title',
        'about_content',
        'services_title',
        'portfolio_title',
        'portfolio_content',
        'faq_title',
        'faq_content',
        'contact_title',
        'contact_content',
        'contact_name_input',
        'contact_email_input',
        'contact_subject_input',
        'contact_message_input',
    ];

    protected $table = 'home_texts';
}