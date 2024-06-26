<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const BOORADOR =1;
    const PUBLICADO=2;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsToMany(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tag');
    }
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }

}
