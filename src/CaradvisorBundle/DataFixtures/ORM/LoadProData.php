<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 23/05/2017
 * Time: 01:07
 */

namespace CaradvisorBundle\DataFixtures\ORM;

use CaradvisorBundle\Entity\Pro;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadProData extends AbstractFixture implements OrderedFixtureInterface
{
    const PRO_MAX = 20;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(1234);

        for ($i = 0; $i < self::PRO_MAX; $i ++) {
            $pro = new Pro();
            $pro->setSiret($this->getRandomSiret());
            $pro->setDealerName($faker->company);
            $pro->setDealerType($faker->randomElement($array = [
                'Garagiste',
                'Concessionnaire',
                'Agent',
                'Carrossier',
                'Autre',
            ]));
            $pro->setAddress($faker->address);
            $pro->setCity($faker->city);
            $pro->setPostalCode($faker->regexify('[0-9]{1}[0-7]{1}[0-9]{2}0'));
            $pro->setPhone($faker->regexify('0[0-9]{1}([0-9]{2}){4}'));
            $pro->setDescription($faker->paragraph(2));
            $pro->setRatingPro($faker->randomElement($array = [
                '1',
                '2',
                '3',
                '4',
                '5',
            ]));
            $pro->setEmail($faker->email);
            $pro->setBrand($faker->company);
            $pro->setIsActive($faker->randomElement($array = ['0', '1']));

            $pro->setUser($this->getReference("users_" . rand(0, LoadUserData::MAX_USER - 1)));

            $manager->persist($pro);

            $this->setReference("pros_" . $i, $pro);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }

    private function getRandomSiret()
    {
        return  rand(100, 999) .
            //rand(100, 999) .
            rand(100, 999) .
            rand(10000, 99999);
    }
}
