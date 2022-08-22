<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Amrun Hakim',
            'username' => 'amrun.hakim',
            'email' => 'amha.hakim@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::factory(5)->create();
        
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // User::create([
        //     'name' => 'amrunhakim',
        //     'email' => 'amrun.hkm@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'nafisha',
        //     'email' => 'nafisha@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        

        // Post::create([
        //     'title' => 'Judul Kesatu',
        //     'slug' => 'judul-kesatu',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci nemo itaque obcaecati dicta ea ex dolore ut nam asperiores animi! Modi, at quos! Eaque itaque cum quisquam, reprehenderit quidem porro eos omnis non et doloremque quis cumque voluptatibus adipisci.',
        //     'body' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci nemo itaque obcaecati dicta ea ex dolore ut nam asperiores animi! Modi, at quos! Eaque itaque cum quisquam, reprehenderit quidem porro eos omnis non et doloremque quis cumque voluptatibus adipisci.</p> <p>magni aliquam nam inventore ex voluptate sit voluptas, necessitatibus rerum? Possimus ab laborum repellendus nobis, consequatur labore id earum maxime molestiae magnam nostrum obcaecati harum distinctio explicabo aliquid dolorem eaque sed neque sunt? Autem soluta quasi itaque necessitatibus aspernatur consequatur voluptate!</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci nemo itaque obcaecati dicta ea ex dolore ut nam asperiores animi! Modi, at quos! Eaque itaque cum quisquam, reprehenderit quidem porro eos omnis non et doloremque quis cumque voluptatibus adipisci.',
        //     'body' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci nemo itaque obcaecati dicta ea ex dolore ut nam asperiores animi! Modi, at quos! Eaque itaque cum quisquam, reprehenderit quidem porro eos omnis non et doloremque quis cumque voluptatibus adipisci.</p> <p>magni aliquam nam inventore ex voluptate sit voluptas, necessitatibus rerum? Possimus ab laborum repellendus nobis, consequatur labore id earum maxime molestiae magnam nostrum obcaecati harum distinctio explicabo aliquid dolorem eaque sed neque sunt? Autem soluta quasi itaque necessitatibus aspernatur consequatur voluptate!</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci nemo itaque obcaecati dicta ea ex dolore ut nam asperiores animi! Modi, at quos! Eaque itaque cum quisquam, reprehenderit quidem porro eos omnis non et doloremque quis cumque voluptatibus adipisci.',
        //     'body' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci nemo itaque obcaecati dicta ea ex dolore ut nam asperiores animi! Modi, at quos! Eaque itaque cum quisquam, reprehenderit quidem porro eos omnis non et doloremque quis cumque voluptatibus adipisci.</p> <p>magni aliquam nam inventore ex voluptate sit voluptas, necessitatibus rerum? Possimus ab laborum repellendus nobis, consequatur labore id earum maxime molestiae magnam nostrum obcaecati harum distinctio explicabo aliquid dolorem eaque sed neque sunt? Autem soluta quasi itaque necessitatibus aspernatur consequatur voluptate!</p>',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci nemo itaque obcaecati dicta ea ex dolore ut nam asperiores animi! Modi, at quos! Eaque itaque cum quisquam, reprehenderit quidem porro eos omnis non et doloremque quis cumque voluptatibus adipisci.',
        //     'body' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci nemo itaque obcaecati dicta ea ex dolore ut nam asperiores animi! Modi, at quos! Eaque itaque cum quisquam, reprehenderit quidem porro eos omnis non et doloremque quis cumque voluptatibus adipisci.</p> <p>magni aliquam nam inventore ex voluptate sit voluptas, necessitatibus rerum? Possimus ab laborum repellendus nobis, consequatur labore id earum maxime molestiae magnam nostrum obcaecati harum distinctio explicabo aliquid dolorem eaque sed neque sunt? Autem soluta quasi itaque necessitatibus aspernatur consequatur voluptate!</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
