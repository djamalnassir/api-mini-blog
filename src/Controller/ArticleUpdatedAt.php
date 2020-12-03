<?php

declare(strict_types=1);

namespace App\Controller;

class ArticleUpdatedAt
{
    public function __invoke($data)
    {
        dd($data);
        return $data;
    }

}