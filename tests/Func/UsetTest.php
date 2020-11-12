<?php

declare(strict_types=1);

namespace App\Tests\Func;

use Faker\Factory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsetTest extends AbstractEndPoint
{

    private string $userPayLoad = '{"email": "%s", "password": "passer"}';

    public function test_getUsers(): void
    {
        $response = $this->getResponseFromRequest(Request::METHOD_GET, '/api/users');
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent);

        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecoded);
    }

    public function test_postUser(): void
    {
        $response = $this->getResponseFromRequest(
            Request::METHOD_POST, 
            '/api/users', 
            $this->getPayLoad()
        );
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent);

        self::assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecoded);
    }

    private function getPayLoad()
    {
        // $faker = Factory::create();
        
        return sprintf($this->userPayLoad, (new Factory)::create()->email);
    }

}