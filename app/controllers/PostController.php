<?php

namespace app\controllers;
use app\models\Post;

class PostController
{
    public function getPosts() {
        $params = [
            //ternary shorthand, if left if true assign it, and if not assign right
            'title' => $_GET['title'] ?: null,
        ];
        $postModel = new Post();
        $posts = $postModel->getAllPostsByTitle($params);
        header("Content-Type: application/json");
        echo json_encode($posts);
        exit();
    }

    public function savePost() {
        //get post data from our form post
        $title = $_POST['title'] ?: null;
        $content = $_POST['content'] ?: null;
        $errors = [];

        //validate and sanitize title name
        if ($title) {
            //sanitize, htmlspecialchars replaces html reserved characters with their entity numbers
            //meaning they can't be run as code
            $title = htmlspecialchars($title);

//            echo htmlspecialchars($name);

            //validate text length
            if (strlen($title) < 2) {
                $errors['title'] = 'title is too short';
            }
        } else {
            $errors['title'] = 'title is required';
        }
                //validate and sanitize title name
        if ($title) {
            //sanitize, htmlspecialchars replaces html reserved characters with their entity numbers
            //meaning they can't be run as code
            $title = htmlspecialchars($title);

//            echo htmlspecialchars($name);

            //validate text length
            if (strlen($title) < 2) {
                $errors['title'] = 'title is too short';
            }
        } else {
            $errors['title'] = 'title is required';
        }
        //validate content of posts
        if ($content) {
            //sanitize, htmlspecialchars replaces html reserved characters with their entity numbers
            //meaning they can't be run as code
            $content = htmlspecialchars($content);

//            echo htmlspecialchars($name);

            //validate text length
            if (strlen($content) < 2) {
                $errors['content'] = 'content of post is too short';
            }
        } else {
            $errors['content'] = 'content is required';
        }

        //if we have errors
        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        //we could save the data off to be saved here

        $returnData = [
            'title' => $title,
            'content' => $content,
        ];
        echo json_encode($returnData);
        exit();

    }

}