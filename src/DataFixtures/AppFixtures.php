<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i <= 20; $i++) {
            $ad = new Ad();

            $title = $faker->sentence;
            $introduction = $faker->sentence(10);
            $content = '<p>' . join("</p><p>", $faker->paragraphs(5)) . '</p>';
            $coverImage = $faker->imageUrl(1000, 450);
            $rooms = mt_rand(1, 5);
            $price = mt_rand(30, 200);

            $ad->setTitle($title)
                ->setIntroduction($introduction)
                ->setContent($content)
                ->setCoverImage($coverImage)
                ->setRooms($rooms)
                ->setPrice($price);

            for ($j = 1; $j <= mt_rand(1, 5); $j++) {
                $image = new Image();

                $url = $faker->imageUrl(650, 450);
                $caption = $faker->sentence;
                $image->setUrl($url);
                $image->setCaption($caption);
                $image->setAd($ad);

                $manager->persist($image);
            }

            $manager->persist($ad);
        }

        $manager->flush();
    }
}
