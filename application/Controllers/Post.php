<?php


namespace App\Controllers;


class Post
{
    public function insert(array $data)
    {
        $postId = 32;

        return $postId;
    }


    public function getPost($id)
    {
        $post = [
            'id'      => $id,
            'title'   => 'Example title',
            'content' => 'Example content',
        ];

        return $post;
    }
}