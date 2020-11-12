<?php

declare(strict_types=1);

namespace App\Tests\Func;

use Faker\Factory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArtTest extends AbstractEndPoint
{

    private string $articlePayLoad = '{"name": "%s", "content": "Je suis un contenu", "author_id": "1"}';

    public function test_getArticles(): void
    {
        $response = $this->getResponseFromRequest(Request::METHOD_GET, '/api/articles');
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent);

        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecoded);
    }

    /*
        public function test_postArticle(): void
        {
            $response = $this->getResponseFromRequest(
                Request::METHOD_POST, 
                '/api/articles', 
                $this->getPayLoad()
            );
            $responseContent = $response->getContent();
            $responseDecoded = json_decode($responseContent);

            dd($responseContent);

            self::assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
            self::assertJson($responseContent);
            self::assertNotEmpty($responseDecoded);
        }

        private function getPayLoad()
        {
            $faker = Factory::create();

            return sprintf($this->articlePayLoad, $faker->name);
        }
    */

}