<?php

namespace App\Models;

class Posts
{
    private static $post_porto = [
        [
            "tittle" => "Judul Pertama",
            "slug" => "judul-pertama",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus harum dicta temporibus, obcaecati fuga voluptatem. Ducimus distinctio quasi, placeat beatae rem possimus vero ex quo, non vitae impedit officia fuga ab explicabo doloremque porro ipsum. Dignissimos nostrum consequatur quidem neque, magnam expedita modi labore maxime molestiae, facere iusto quae esse a odit ut quisquam nisi, iste ab in nobis itaque quo officia eligendi! Obcaecati laboriosam fuga reiciendis voluptatem voluptates, impedit hic explicabo consequatur. Quaerat non exercitationem dolorum deserunt provident. Temporibus accusamus dolorum exercitationem reprehenderit consectetur sequi assumenda blanditiis, et doloremque aliquid doloribus. Error vel excepturi numquam atque commodi minus quibusdam!",
        ],
        [
            "tittle" => "Judul Kedua",
            "slug" => "judul-kedua",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus harum dicta temporibus, obcaecati fuga voluptatem. Ducimus distinctio quasi, placeat beatae rem possimus vero ex quo, non vitae impedit officia fuga ab explicabo doloremque porro ipsum. Dignissimos nostrum consequatur quidem neque, magnam expedita modi labore maxime molestiae, facere iusto quae esse a odit ut quisquam nisi, iste ab in nobis itaque quo officia eligendi! Obcaecati laboriosam fuga reiciendis voluptatem voluptates, impedit hic explicabo consequatur. ",
        ],
    ];

    public static function all()
    {
        return collect(self::$post_porto);
    }

    public static function find_all($slug)
    {
        $posts = static::all();
        return $posts->firstWhare('slug', $slug);
    }
}
