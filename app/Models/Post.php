<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $date;
    public $excerpt;
    public $slug;
    public $body;

    public function __construct($title, $date, $excerpt, $slug, $body){
        $this->title = $title;
        $this->date = $date;
        $this->excerpt = $excerpt;
        $this->slug = $slug;
        $this->body = $body;
    }
    
    /**
     * Get all the post
     */
    public static function all(){   
        //Get each files as yaml and store it to new array called $post
        
        //$files =  File::files(resource_path("posts"));
        //1. Using array_map
        // $post = array_map(function($file){
                //Change every file to yaml
        //     $object = YamlFrontMatter::parseFile($file);
        //     return $object;
        // }, $files);
        
        //2. Using foreach
        // $post =[];
        // foreach($files as $file){
                //Change every file to yaml
        //     $document = YamlFrontMatter::parseFile($file);
                //Makes as Post Object
        //     $post[]= new Post(
        //         $document->title,
        //         $document->date,
        //         $document->excerpt,
        //         $document->slug,
        //         $document->body()
        //     );
        // }

        //3. Using collection & store it as a cache name post.all
        return Cache::rememberForever('post.all', function(){
            return collect(File::files(resource_path("posts")))
                ->map(function($file){
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function($document){
                    return new Post(
                        $document->title,
                        $document->date,
                        $document->excerpt,
                        $document->slug,
                        $document->body()
                    );
                })
                ->sortBy('date', SORT_REGULAR, true);
            /**Explanation :
             * For each file, map it to Yaml, and then maken an object from that result. Each object become a part of collection. Last, cache that forever
             */

        });
    }

    /**
     * Find a post by it's name
     */
    public static function find($postName){   
        // if(!file_exists($path = resource_path("posts/{$postName}.html"))){
        //     throw new ModelNotFoundException();
        // }
       
        // return  cache()->remember("blog.posts.{$postName}", 1, function() use($path){
        //     $document = YamlFrontMatter::parseFile($path);
        //     return new Post(
        //         $document->title,
        //         $document->date,
        //         $document->excerpt,
        //         $document->slug,
        //         $document->body()
        //     );
        // });
        return Static::all()->firstWhere('slug', $postName);
    }
}
