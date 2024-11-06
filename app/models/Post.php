<?php

namespace app\models;

class Post {
    public function getAllPostsByTitle($params) {
        //in future these will come from the database

        $allPosts = [
            [
                'title' => 'Title',
                'content' => 'Content'
            ],
        ];

        if (!empty($params['title'])) {
            return array_filter($allPosts, function ($post) use ($params) {
                if ($post['title'] === $params['title']) {
                    return $post;
                };
                return null;
            });
        }

        return $allPosts;
    }

    public function savePosts() {
        //in future this will save posts to the database
    }
}