<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{

    public static function find($slug)
    {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException("Post [{$slug}] not found.");
        }

        return cache()->remember("post.{$slug}", 1200, fn() => file_get_contents($path));

    }

    public static function all(): array
    {
        $posts = [];
        foreach (glob(resource_path("posts/*.html")) as $path) {
            $slug = basename($path, ".html");
            $posts[$slug] = self::find($slug);
        }
        return $posts;
    }
}
