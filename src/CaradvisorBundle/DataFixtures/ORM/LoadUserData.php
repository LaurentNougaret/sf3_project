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
            $user->setAddress($faker->address);
            $user->setCity($faker->city);
            $user->setPostalCode($faker->regexify('[0-9]{1}[0-7]{1}[0-9]{2}0'));
            $user->setPhone($faker->regexify('0[0-9]{1}([0-9]{2}){4}'));
            $user->setBirthDate($faker->dateTime);
            $user->setMailingList($faker->randomElement($array = ['0', '1']));
            $user->setIsActive($faker->randomElement($array = ['0', '1']));
            if ($i%2 == 0) {
                $user->setRoles(['ROLE_PART']);
            } else {
                $user->setRoles(['ROLE_PRO']);
            }

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
        return 1;
    }
}
