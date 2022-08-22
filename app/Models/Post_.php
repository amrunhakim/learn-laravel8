<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul amrun",
            "slug" => "judul-pertama",
            "author" => "amrunhakim",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui eveniet ratione blanditiis commodi perspiciatis eaque natus eos, laudantium cum repellendus unde odit ad porro enim animi, exercitationem reprehenderit quibusdam molestiae ex? Sed enim aperiam labore repudiandae quo impedit accusantium eveniet, quos aliquam neque officiis quidem maxime aut vitae placeat deserunt sunt magnam quae dignissimos explicabo hic totam ea saepe at. Eius ducimus odit hic placeat vitae maiores, rem quae culpa temporibus odio aperiam dolore, pariatur dignissimos modi ullam nihil inventore."
        ],
        [
            "title" => "Judul hakim",
            "slug" => "judul-kedua",
            "author" => "amrunhakim",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui eveniet ratione blanditiis commodi perspiciatis eaque natus eos, laudantium cum repellendus unde odit ad porro enim animi, exercitationem reprehenderit quibusdam molestiae ex? Sed enim aperiam labore repudiandae quo impedit accusantium eveniet, quos aliquam neque officiis quidem maxime aut vitae placeat deserunt sunt magnam quae dignissimos explicabo hic totam ea saepe at. Eius ducimus odit hic placeat vitae maiores, rem quae culpa temporibus odio aperiam dolore, pariatur dignissimos modi ullam nihil inventore."
        ]
    ]; 

    public static function all()
    {
        return collect(self::$blog_posts); ## pake self karena yg dipanggil properties static
    }

    public static function find($slug)
    {
        $posts = static::all(); ## pake static karena yg dipanggil method static
        return $posts->firstWhere('slug', $slug);
        
        /*$post = [];
        foreach ($posts as $p) {
            if ($p["slug"] === $slug) {
                $post = $p;
            }
        }*/ 
    }
}
