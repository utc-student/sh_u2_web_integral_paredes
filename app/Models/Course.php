<?php

namespace App\Models;

use App\Enums\CourseStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'price_id',
        'published_at'
    ];

    protected $casts = [
        'status' => CourseStatus::class,
        'published_at' => 'datetime'
    ];

    /* Accesor */
    public function image():Attribute {
        return new Attribute(
            get: function () {
                return $this->image_path ? Storage::url($this->image_path) : "https://image.pngaaa.com/13/1887013-middle.png"; 
            }, 
        );
    }
    
    /* RELACIONES */
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
