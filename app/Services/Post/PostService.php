<?php

namespace App\Services\Post;

use App\Contracts\Dao\PostDaoInterface;
use App\Contracts\Services\PostServiceInterface;

class PostService implements PostServiceInterface
{
    private $postDao;

    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    public function PostCreate($request)
    {
        return $this->postDao->PostCreate($request);
    }

    public function PostConfirm($request)
    {
        return $this->postDao->PostConfirm($request);
    }

    public function PostList()
    {
        return $this->postDao->PostList();
    }

    public function PostEdit($id)
    {
        return $this->postDao->PostEdit($id);
    }

    public function UpdateConfirm($request)
    {
        return $this->postDao->UpdateConfirm($request);
    }

    public function PostUpdate($request, $id)
    {
        return $this->postDao->PostUpdate($request, $id);
    }

    public function PostDelete($id)
    {
        return $this->postDao->PostDelete($id);
    }

    public function PostSearch($request)
    {
      return $this->postDao->PostSearch($request);
    }
}
