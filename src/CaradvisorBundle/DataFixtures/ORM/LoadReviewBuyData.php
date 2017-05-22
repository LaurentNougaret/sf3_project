<?php

namespace CaradvisorBundle\DataFixtures\ORM;


use CaradvisorBundle\Entity\ReviewBuy;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadReviewBuyData extends AbstractFixture implements OrderedFixtureInterface
{
    const REVIEWBUY = 50;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(1234);

        for ($i = 0; $i < self::REVIEWBUY; $i++){
            $reviewBuy = new ReviewBuy();
            $reviewBuy->setDealerType($faker->randomElement($array = [
                'Garagiste',
                'Concessionnaire',
                'Agent',
                'Carrossier',
                'Autre',
                ]));
            $reviewBuy->setDealerName($faker->company);
            $reviewBuy->setCity($faker->city);
            $reviewBuy->setPostalCode($faker->regexify('[0-9]{1}[0-7]{1}[0-9]{2}0'));
            $reviewBuy->setRatingGlobal($faker->randomElement($array = [
                '1',
                '2',
                '3',
                '4',
                '5',
            ]));
            $reviewBuy->setSubject($faker->sentence(6));
            $reviewBuy->setReview($faker->paragraph(3));
            $reviewBuy->setDateBuy($faker->dateTime);
            $reviewBuy->setRatingWelcome($faker->randomElement($array = [
                '1',
                '2',
                '3',
                '4',
                '5',
            ]));
            $reviewBuy->setInformationDelayRating($faker->randomElement($array = [
                '1',
                '2',
                '3',
                '4',
                '5',
            ]));
            $reviewBuy->setWantedInformation($faker->randomElement($array = ['0', '1']));
            $reviewBuy->setTest($faker->randomElement($array = ['0', '1']));
            $reviewBuy->setWantedEngineTest($faker->randomElement($array = ['0', '1']));
            $reviewBuy->setWarranty($faker->randomElement($array = ['0', '1']));
            $reviewBuy->setFundingSolution($faker->randomElement($array = ['0', '1']));
            $reviewBuy->setRecommendProRating($faker->randomElement($array = [
                '1',
                '2',
                '3',
                '4',
                '5',
            ]));
            $reviewBuy->setAdvice($faker->paragraph(3));
            $reviewBuy->setAttachedFile('http://aws-cf.caradisiac.com/prod/mesimages/142824/facture%20revision%202%20an%2036.800%20km.jpg');
            $reviewBuy->setDateReview($faker->dateTime);
            $reviewBuy->setUser($this->getReference("users_" . rand(0, LoadUserData::MAX_USER - 1)));

            $manager->persist($reviewBuy);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}