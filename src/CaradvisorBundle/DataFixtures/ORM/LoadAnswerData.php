<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 23/05/2017
 * Time: 01:27
 */

namespace CaradvisorBundle\DataFixtures\ORM;

use CaradvisorBundle\Entity\Answer;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadAnswerData extends AbstractFixture implements OrderedFixtureInterface
{
    const ANSWER_MAX = 20;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(1234);

        for ($i = 0; $i < self::ANSWER_MAX; $i ++) {
            $answer = new Answer();
            $answer->setMessage($faker->paragraph(4));
            $answer->setDate($faker->dateTime);

            $manager->persist($answer);

            $this->setReference('answers_'. $i, $answer);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 5;
    }
}
