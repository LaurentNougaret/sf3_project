<?php

namespace CaradvisorBundle\DataFixtures\ORM;


use CaradvisorBundle\Entity\Vehicle;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadVehicleData extends AbstractFixture implements OrderedFixtureInterface
{
    const VEHICLE_MAX = 30;
    /**
     * Load data fixtures with a passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(1234);

        for ($i = 0; $i<self::VEHICLE_MAX; $i++) {
            $vehicle = new Vehicle();
            $vehicle->setBrand($faker->unique()->company);
            $vehicle->setModel($faker->word);
            $vehicle->setVersion($faker->numberBetween($min = 1, $max = 5));
            $vehicle->setKilometers($faker->numberBetween($min = 20000, $max = 50000));
            $vehicle->setRegistration($faker->regexify('[A-Z]{2}[-][0-9]{3}[-][A-Z]{2}'));
            $vehicle->setYear($faker->year);
            $vehicle->setEnergy($faker->randomElement($array = array('Gasoil', 'Essence', 'Electrique', 'Hybride')));

            $vehicle->setUser($this->getReference("users_" . rand(0, LoadUserData::MAX_USER - 1)));

            $manager->persist($vehicle);
        }
        $manager->flush();
    }

    /**
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }
}
