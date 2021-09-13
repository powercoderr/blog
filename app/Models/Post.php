<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;
    
    /**
     * Find a post by it's name
     */
    public static function find($postName){   
        if(!file_exists($path = resource_path("posts/{$postName}.html"))){
            throw new ModelNotFoundException();
        }
        return  cache()->remember("blog.posts.{$postName}", 3600, fn()=> file_get_contents($path));
    }
}
