<?php

namespace CaradvisorBundle\DataFixtures\ORM;


use CaradvisorBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    const MAX_USER = 11;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(1234);

        for ($i = 0; $i < self::MAX_USER; $i++){
            $user = new User();
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setUserName($faker->userName);
            $user->setPassword('carcar');
            $user->setEmail($faker->email);
            $user->setGender($faker->randomElement($array = ['H', 'F', 'Non précisé']));
            $user->setAddress($faker->address);
            $user->setCity($faker->city);
            $user->setPostalCode($faker->regexify('[0-9]{1}[0-7]{1}[0-9]{2}0'));
            $user->setPhone($faker->regexify('0[0-9]{1}([0-9]{2}){4}'));
            $user->setBirthDate($faker->dateTime);
            $user->setUserType($faker->randomElement($array = ['Professionnel', 'Particulier']));
            $user->setMailingList($faker->randomElement($array = ['0', '1']));
            $user->setIsActive($faker->randomElement($array = ['0', '1']));

            $manager->persist($user);

            $this->setReference("users_" . $i, $user);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
