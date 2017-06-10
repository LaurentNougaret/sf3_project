<?php

namespace CaradvisorBundle\DataFixtures\ORM;


use CaradvisorBundle\Entity\UserProfile;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserProfileData extends AbstractFixture implements OrderedFixtureInterface
{
    const MAX_USER = 11;

    private $container;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(1234);

        for ($i = 0; $i < self::MAX_USER; $i++){
            $userProfile = new UserProfile();
            $userProfile->setAddress($faker->address);
            $userProfile->setCity($faker->city);
            $userProfile->setPostalCode($faker->regexify('[0-9]{1}[0-7]{1}[0-9]{2}0'));
            $userProfile->setPhone($faker->regexify('0[0-9]{1}([0-9]{2}){4}'));
            $userProfile->setBirthDate($faker->dateTime);

            $manager->persist($userProfile);

            $this->setReference("userProfiles_" . $i, $userProfile);
        }
        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getOrder()
    {
        return 1;
    }
}
