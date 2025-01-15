<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image_path',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this ->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
   

}
