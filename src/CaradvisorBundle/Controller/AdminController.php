<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\ReviewBuy;
use CaradvisorBundle\Entity\ReviewRepair;
use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use CaradvisorBundle\Entity\Answer;
use CaradvisorBundle\Entity\Pro;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * @Route ("/admin", name="admin")
     * @param Request $request
     * @return Response
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        //get error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        //last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@Caradvisor/Admin/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * @Route ("/admin/reviews", name="admin_reviews")
     * @param User $user
     * @return Response
     */
    public function adminReviewsAction()
    {
        $reviewsBuy = $this->getDoctrine()->getRepository('CaradvisorBundle:ReviewBuy')->findAll();
        $reviewsRepair = $this->getDoctrine()->getRepository('CaradvisorBundle:ReviewRepair')->findAll();
        return $this->render('@Caradvisor/Admin/Default/adminReviews.html.twig', [
            'reviewsBuy' => $reviewsBuy,
            'reviewsRepair' => $reviewsRepair
        ]);
    }

    /**
     * @Route("/admin/reviews/activate-review-buy/{reviewBuy}", name="activate-review-buy")
     * @param ReviewBuy $reviewBuy
     * @return Response
     */
    public function activateBuyAccount(ReviewBuy $reviewBuy)
    {
        $em = $this->getDoctrine()->getManager();
        $reviewBuy->setIsActive(true);
        $em->persist($reviewBuy);
        $em->flush();
        return $this->redirectToRoute("admin_reviews", [
            'reviewBuy' => $reviewBuy
        ]);

    }

    /**
     * @Route("/admin/reviews/activate-review-repair/{reviewRepair}", name="activate-review-repair")
     * @param ReviewRepair $reviewRepair
     * @return Response
     */
    public function activateRepairAccount(ReviewRepair $reviewRepair)
    {
        $em = $this->getDoctrine()->getManager();
        $reviewRepair->setIsActive(true);
        $em->persist($reviewRepair);
        $em->flush();
        return $this->redirectToRoute("admin_reviews", [
            'reviewRepair' => $reviewRepair
        ]);

    }


}
