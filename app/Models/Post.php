<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul artikel 1',
                'author' => 'Ari Syafri',
                'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque eum ut, modi in reprehenderit voluptatem repellendus quam suscipit earum nobis aut unde provident quae, officia nam tempora dolor, non saepe rerum? Voluptas facere ab quaerat esse nulla, quo velit magnam quisquam aliquid, autem deleniti sed possimus? Inventore doloribus, autem exercitationem officiis ducimus debitis sapiente quia quod praesentium, itaque repellat non consectetur sit dolores sint eaque beatae suscipit, optio natus consequatur!'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul artikel 2',
                'author' => 'Ari',
                'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. fafafafffaEaque eum ut, modi in reprehenderit voluptatem repellendus quam suscipit earum nobis aut unde provident quae, officia nam tempora dolor, non saepe rerum? Voluptas facere ab quaerat esse nulla, quo velit magnam quisquam aliquid, autem deleniti sed possimus? '
            ]
        ];
    }

    public static function find($slug)
    {

        //ini call back
        // return Arr::first(static::all(), function ($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });

        // dengan arrow function
        return Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

    }

}

?>
