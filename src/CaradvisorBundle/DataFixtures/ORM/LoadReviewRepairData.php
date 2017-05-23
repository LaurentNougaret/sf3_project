<?php

namespace CaradvisorBundle\DataFixtures\ORM;


use CaradvisorBundle\Entity\ReviewRepair;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadReviewRepairData extends AbstractFixture implements OrderedFixtureInterface
{
    const REVIEWREPAIR_MAX = 50;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(1234);

        $totalAnswer = 0;

        for ($i = 0; $i < self::REVIEWREPAIR_MAX; $i ++){
            $reviewRepair = new ReviewRepair();
            $reviewRepair->setDealerType($faker->randomElement($array = [
                'Garagiste',
                'Concessionnaire',
                'Agent',
                'Carrossier',
                'Autre',
            ]));
            $reviewRepair->setDealerName($faker->company);
            $reviewRepair->setCity($faker->city);
            $reviewRepair->setPostalCode($faker->regexify('[0-9]{1}[0-7]{1}[0-9]{2}0'));
            $reviewRepair->setRatingGlobal($faker->randomElement($array = [
                '1',
                '2',
                '3',
                '4',
                '5',
            ]));
            $reviewRepair->setSubject($faker->sentence(6));
            $reviewRepair->setReview($faker->paragraph(3));
            $reviewRepair->setDateRepair($faker->dateTime);
            $reviewRepair->setRatingWelcome($faker->randomElement($array = [
                '1',
                '2',
                '3',
                '4',
                '5',
            ]));
            $reviewRepair->setTypeRepair($faker->sentence(4));
            $reviewRepair->setAppointmentDelay($faker->numberBetween($min = 1, $max = 30));
            $reviewRepair->setOnSpotDelayRating($faker->randomElement($array = [
                '1',
                '2',
                '3',
                '4',
                '5',
            ]));
            $reviewRepair->setExplanationRepair($faker->randomElement($array = ['1', '2']));
            $reviewRepair->setPriceRepair($faker->randomElement($array = ['1', '2']));
            $reviewRepair->setAuthorizationRepair($faker->randomElement($array = ['1', '2']));
            $reviewRepair->setRespectQuotationRepair($faker->randomElement($array = ['1', '2']));
            $reviewRepair->setCourtesyVehicle($faker->randomElement($array = ['1', '2']));
            $reviewRepair->setRespectDelayRepair($faker->randomElement($array = ['1', '2']));
            $reviewRepair->setConditionVehicleRating($faker->randomElement($array = [
                '1',
                '2',
                '3',
                '4',
                '5',
            ]));
            $reviewRepair->setRecommendProRating($faker->randomElement($array = [
                '1',
                '2',
                '3',
                '4',
                '5',
            ]));
            $reviewRepair->setAdvice($faker->paragraph(3));
            $reviewRepair->setAttachedFile('http://aws-cf.caradisiac.com/prod/mesimages/142824/facture%20revision%202%20an%2036.800%20km.jpg');
            $reviewRepair->setDateReview($faker->dateTime);

            $reviewRepair->setUser($this->getReference("users_" . rand(0, LoadUserData::MAX_USER - 1)));
            $reviewRepair->setPro($this->getReference("pros_" . rand(0, LoadProData::PRO_MAX - 1)));
            if ($totalAnswer < 10){
                $reviewRepair->setAnswer($this->getReference("answers_" . $totalAnswer));
                $totalAnswer++;
            }
            $manager->persist($reviewRepair);
        }
        $manager->flush();
    }
    public function getOrder()
    {
        return 5;
    }
}
