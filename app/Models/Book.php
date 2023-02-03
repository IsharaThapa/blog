<?php

namespace App\Models;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class Book extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    public function category(){
        return $this->belongsTo(Category::class, 'categories_id');
    }
}

