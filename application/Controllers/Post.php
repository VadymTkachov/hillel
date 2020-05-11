<?php


namespace App\Controllers;


/**
 * Class Post
 * @package App\Controllers
 */
class Post
{
    /**
     * @param array $data
     *
     * @return int
     */
    public function insert(array $data)
    {
        $postId = 32;

        return $postId;
    }


    /**
     * @param $id
     *
     * @return array
     */
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