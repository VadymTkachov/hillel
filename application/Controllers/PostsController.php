<?php


namespace App\Controllers;


use Core\Controller;
use Core\View;
use App\Controllers\Post;

/**
 * Class PostsController
 * @package App\Controllers
 */
class PostsController extends Controller
{
    /**
     * Index action
     */
    public function index()
    {
        View::render('posts/index.php');
    }


    /**
     * Create action
     */
    public function create()
    {
        View::render('posts/create.php');
    }


    /**
     * Store action
     */
    public function store()
    {
        if (empty($_POST['title'])) {
            $this->validation = false;
            $this->data       = [
                'data'        => $_POST,
                'title_error' => 'Title should not be empty!',
            ];
        }

        if ( ! $this->validation) {
            View::render('posts/create.php', $this->data);
        }

        $modelData = [
            'title'   => $_POST['title'],
            'content' => ! empty($_POST['content']) ? $_POST['content'] : '',
        ];
        $post      = new Post();
        $postId    = $post->insert($modelData);

        site_redirect('posts/' . $postId);
    }


    /**
     * @param int $id
     */
    public function show(int $id)
    {
        $postModel = new Post();
        $post      = $postModel->getPost($id);

        View::render('posts/show.php', ['post' => $post]);
    }
}
