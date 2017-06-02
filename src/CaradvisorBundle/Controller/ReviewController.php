<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\ReviewRepair;
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
        $reviewRepair = new ReviewRepair();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ReviewRepairType::class, $reviewRepair);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $em->persist($reviewRepair);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Reviews/repair.html.twig', [
            'form'  => $form->createView(),
        ]);
    }
}
