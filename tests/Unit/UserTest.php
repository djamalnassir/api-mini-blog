<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Entity\User;
use App\Entity\Article;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }

    public function test_getEmail(): void
    {
        $value = 'test@test.fr'; // exemple d'un email pour instancier la class
        $response = $this->user->setEmail($value);

        self::assertInstanceOf(User::class, $response);
        self::assertEquals($value, $this->user->getEmail());
        self::assertEquals($value, $this->user->getUsername());
    }

    public function test_getRoles(): void
    {
        $value = ['ROLE_ADMIN']; // exemple de role
        $response = $this->user->setRoles($value);

        self::assertInstanceOf(User::class, $response);
        self::assertContains('ROLE_USER', $this->user->getRoles());
        self::assertContains('ROLE_ADMIN', $this->user->getRoles());
    }

    public function test_getPassword(): void
    {
        $value = 'passer'; // exemple de mot de pass
        $response = $this->user->setPassword($value);

        self::assertInstanceOf(User::class, $response);
        self::assertContains($value, $this->user->getPassword());
    }

    public function test_getArticle(): void
    {
        $value = new Article();
        $response = $this->user->addArticle($value);

        self::assertInstanceOf(User::class, $response);
        self::assertCount(1, $this->user->getArticles());
        self::assertTrue($this->user->getArticles()->contains($value));

        $response = $this->user->removeArticle($value);

        self::assertInstanceOf(User::class, $response);
        self::assertCount(0, $this->user->getArticles());
        self::assertFalse($this->user->getArticles()->contains($value));
    }

}