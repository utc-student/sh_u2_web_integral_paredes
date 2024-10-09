<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'summary', 
        'description', 
        'status', 
        'image_path', 
        'video_path', 
        'welcome_message', 
        'goodbye_message', 
        'observation', 
        'user_id', 
        'level_id', 
        'category_id', 
        'price_id'
    ];
}
