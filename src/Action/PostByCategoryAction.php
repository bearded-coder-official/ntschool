<?php

namespace NtSchool\Action;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Pagination\Paginator;
use NtSchool\Model\Category;
use NtSchool\Model\Post;
use Psr\Http\Message\ServerRequestInterface;

final class PostByCategoryAction
{
    /** @var \Illuminate\View\Factory */
    protected $renderer;

    public function __construct($view)
    {
        $this->renderer = $view;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');

        return $this->renderer->make('posts-by-category', [
            'category' => Category::find($id)
        ]);
    }
}
