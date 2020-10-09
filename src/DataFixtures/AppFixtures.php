<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        
        $fake = Factory::create();

        for($u=0; $u<5; $u++){

            $user = new User();
            $passHash = $this->encoder->encodePassword($user, 'passer');

            $user->setEmail($fake->email)
                 ->setPassword($passHash);

            $manager->persist($user);

            for($a=0; $a<random_int(5, 15); $a++){

                $article = (new Article())->setAuthor($user)
                    ->setContent($fake->text(300))
                    ->setName($fake->text(50));

                $manager->persist($article);
            }
        }

        $manager->flush();
    }
}
