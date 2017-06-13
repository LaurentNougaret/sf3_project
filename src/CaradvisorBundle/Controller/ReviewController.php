<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Pro;
use CaradvisorBundle\Entity\ReviewBuy;
use CaradvisorBundle\Entity\ReviewRepair;
use CaradvisorBundle\Form\ReviewBuyType;
use CaradvisorBundle\Form\ReviewRepairType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ReviewController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/review/repair", name="review_repair")
     */
    public function addReviewRepairAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_PART', null, 'Vous ne pouvez pas déposez d\'avis avec votre compte professionnel');

        $reviewRepair = new ReviewRepair();

        $form = $this->createForm(ReviewRepairType::class, $reviewRepair);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $reviewRepair->setDateReview(new \DateTime());
            $em = $this->getDoctrine()->getManager();

            $dealerName = $form['dealerName']->getData();
            $city = $form['city']->getData();
            $postalCode = $form['postalCode']->getData();

            $repository = $this->getDoctrine()->getRepository(Pro::class);

            $proId = $repository->findProIdByName($dealerName, $city, $postalCode)[0];
            $reviewRepair->setPro($proId);
            $reviewRepair->setUser($this->getUser());
            $em->persist($reviewRepair);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Reviews/repair.html.twig', [
            'form'          => $form->createView(),
            'reviewRepair'  => $reviewRepair,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/review/buy/new", name="review_new")
     */
    public function addReviewNewAction(Request $request) {
        $this->denyAccessUnlessGranted('ROLE_PART', null, 'Vous ne pouvez pas déposez d\'avis avec votre compte professionnel');

        $reviewBuy = new ReviewBuy();
        $form = $this->createForm(ReviewBuyType::class, $reviewBuy);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $reviewBuy->setReviewBuyType('Neuf');
            $reviewBuy->setDateReview(new \DateTime());

            $em = $this->getDoctrine()->getManager();

            $dealerName = $form['dealerName']->getData();
            $city = $form['city']->getData();
            $postalCode = $form['postalCode']->getData();

            $repository = $this->getDoctrine()->getRepository(Pro::class);

            $proId = $repository->findProIdByName($dealerName, $city, $postalCode)[0];
            $reviewBuy->setPro($proId);
            $reviewBuy->setUser($this->getUser());

            $em->persist($reviewBuy);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Reviews/buy.html.twig',[
            'form'      => $form->createView(),
            'reviewBuy' => $reviewBuy,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/review/buy/used", name="review_used")
     */
    public function addReviewUsedAction(Request $request) {
        $this->denyAccessUnlessGranted('ROLE_PART', null, 'Vous ne pouvez pas déposez d\'avis avec votre compte professionnel');

        $reviewBuy = new ReviewBuy();
        $form = $this->createForm(ReviewBuyType::class, $reviewBuy);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $reviewBuy->setReviewBuyType('Occasion');
            $reviewBuy->setDateReview(new \DateTime());

            $em = $this->getDoctrine()->getManager();

            $dealerName = $form['dealerName']->getData();
            $city = $form['city']->getData();
            $postalCode = $form['postalCode']->getData();

            $repository = $this->getDoctrine()->getRepository(Pro::class);

            $proId = $repository->findProIdByName($dealerName, $city, $postalCode)[0];
            $reviewBuy->setPro($proId);
            $reviewBuy->setUser($this->getUser());

            $em->persist($reviewBuy);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Reviews/buy.html.twig',[
            'form'      => $form->createView(),
            'reviewBuy' => $reviewBuy,
        ]);
    }
}
