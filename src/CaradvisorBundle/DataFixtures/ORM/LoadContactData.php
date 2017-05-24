<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 22/05/17
 * Time: 17:49
 */

namespace CaradvisorBundle\DataFixtures\ORM;


use CaradvisorBundle\Entity\Contact;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadContactData extends AbstractFixture implements OrderedFixtureInterface
{
    const MAX_CONTACT = 5;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(1234);

        for ($i = 0; $i < self::MAX_CONTACT; $i++) {
            $contact = new Contact();
            $contact->setLastname($faker->lastName);
            $contact->setFirstname($faker->firstName);
            $contact->setEmail($faker->email);
            $contact->setSubject($faker->sentence(6));
            $contact->setMessage($faker->paragraph(3));

            $manager->persist($contact);
        }
        $manager->flush();

    }

    /**
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }

}