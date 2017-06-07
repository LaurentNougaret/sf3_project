<?php

namespace CaradvisorBundle\Controller;

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
            $em = $this->getDoctrine()->getManager();
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
     * @Route("/review/buy", name="review_buy")
     */
    public function addReviewBuyAction(Request $request) {
        $this->denyAccessUnlessGranted('ROLE_PART', null, 'Vous ne pouvez pas déposez d\'avis avec votre compte professionnel');

        $reviewBuy = new ReviewBuy();
        $form = $this->createForm(ReviewBuyType::class, $reviewBuy);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reviewBuy);
            $em->flush;

            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Reviews/buy.html.twig',[
            'form'      => $form->createView(),
            'reviewBuy' => $reviewBuy,
        ]);
    }
}
