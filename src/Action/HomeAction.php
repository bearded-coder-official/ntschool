<?php

namespace NtSchool\Action;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Pagination\Paginator;
use NtSchool\Model\Post;
use Psr\Http\Message\ServerRequestInterface;

final class HomeAction
{
    public function __invoke(ServerRequestInterface $request)
    {
        $page = $request->getQueryParams()['page'] ?? 1;
        $postsPerPage = 4;
        $offset = $page == 1 ? 0 : ($page - 1) * $postsPerPage;

        $total = Manager::select('select COUNT(*) as counter from posts');

        $posts = new Paginator(
            Post::skip($offset)->take($postsPerPage)->get(),
            $postsPerPage,
            $page
        );

        return view('index', [
            'posts' => $posts,
            'total' => round($total[0]->counter / $postsPerPage)
        ]);

//        return $this->renderer->make('index', [
//            'posts' => $posts,
//            'total' => round($total[0]->counter / $postsPerPage)
//        ]);
    }
}
