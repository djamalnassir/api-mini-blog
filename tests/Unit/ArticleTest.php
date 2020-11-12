<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Entity\User;
use App\Entity\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    private Article $article;

    protected function setUp(): void
    {
        parent::setUp();
        $this->article = new Article();
    }

    public function test_getName(): void
    {
        $value = 'Titre test d\'un article';
        $responce = $this->article->setName($value);

        self::assertInstanceOf(Article::class, $responce);
        self::assertEquals($value, $this->article->getName());
    }

    public function test_getContent(): void
    {
        $value = 'Contenu test d\'un article';
        $responce = $this->article->setContent($value);

        self::assertInstanceOf(Article::class, $responce);
        self::assertEquals($value, $this->article->getContent());
    }

    public function test_getAuthor(): void
    {
        $value = new User();
        $responce = $this->article->setAuthor($value);

        self::assertInstanceOf(Article::class, $responce);
        self::assertInstanceOf(User::class, $this->article->getAuthor());
    }
}