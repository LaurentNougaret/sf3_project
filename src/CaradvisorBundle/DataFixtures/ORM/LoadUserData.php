<?php

namespace CaradvisorBundle\DataFixtures\ORM;


use CaradvisorBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    const MAX_USER = 11;

    /**
     * @var container
     */
    private $container;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(1234);

        for ($i = 0; $i < self::MAX_USER; $i++){
            $user = new User();
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setUserName($faker->userName);
            $user->setPassword(password_hash("carcar", PASSWORD_BCRYPT));
            $user->setEmail($faker->email);
            $user->setGender($faker->randomElement($array = ['H', 'F', 'Non précisé']));
            $user->setMailingList($faker->randomElement($array = ['0', '1']));
            $user->setIsActive($faker->randomElement($array = ['0', '1']));
            if ($i%2 == 0) {
                $user->setRoles(['ROLE_PART']);
            } else {
                $user->setRoles(['ROLE_PRO']);
            }

            $user->setUserProfile($this->getReference('userProfiles_' . $i));

            $manager->persist($user);

            $this->setReference("users_" . $i, $user);
        }
        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getOrder()
    {
        return 2;
    }
}
