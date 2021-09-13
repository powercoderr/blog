<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    use HasFactory;
    /**
     * Get all the post
     */
    public static function all(){   
        $files =  File::files(resource_path("posts"));
        return array_map(function($file){
            return $file->getContents();
        }, $files);
    }

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
