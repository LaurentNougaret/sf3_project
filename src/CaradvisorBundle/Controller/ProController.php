<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Pro;
use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use CaradvisorBundle\Form\ProProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ProController extends Controller
{
    /**
     * @Route("/pro/{pro}", name="pro")
     * @param Pro $pro
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Pro $pro)
    {
        return $this->render('@Caradvisor/Pro/home.html.twig', [
            "pro" => $pro,
        ]);
    }
    /**
     * @Route("/pro/signup", name="pro_signup")
     */
    public function signupAction()
    {
        return $this->render('@Caradvisor/Pro/signup.html.twig');
    }

    /**
     * @Route("/pro/profile/{pro}", name="pro_profile")
     * @param Request $request
     * @param Pro $pro
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profileAction(Request $request, Pro $pro)
    {
        $newpro = new Pro();
        $form = $this->createForm(ProProfileType::class, $newpro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newpro);
            $em->flush();

            return $this->redirectToRoute('pro');
        }
        return $this->render('@Caradvisor/Pro/profile.html.twig', [
            "form" => $form->createView(),
            "pro" => $pro
        ]);
    }

    /**
     * @Route("/pro/establishments/{pro}", name="pro_establishments")
     * @param Pro $pro
     * @return \Symfony\Component\HttpFoundation\Response
     * @internal param Vehicle $vehicle
     */
    public function establishmentsAction(Pro $pro)
    {
        return $this->render('@Caradvisor/Pro/establishments.html.twig', [
            'pro' => $pro,
            'data' => $pro ->getUser(),

        ]);
    }

    /**
     * @Route("/pro/reviews/{pro}", name="pro_reviews")
     * @param Pro $pro
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function reviewsAction(Pro $pro)
    {
        return $this->render('@Caradvisor/Pro/reviews.html.twig', [
            'data' => $pro->getReviewRepairs(),
            'beta' => $pro->getReviewBuys(),
            'pro' =>  $pro
        ]);
    }

    /**
     * @Route("/pro/settings/{pro}", name="pro_settings")
     * @param Pro $pro
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function settingsAction(Pro $pro)
    {
        return $this->render('@Caradvisor/Pro/settings.html.twig', [
            'pro' => $pro
        ]);
    }

    /**
     * @Route("/pro/settings/password/{pro}", name="pro_password")
     * @param Pro $pro
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function passwordAction(Pro $pro)
    {
        return $this->render('@Caradvisor/Pro/password.html.twig', [
        "pro" => $pro,
        ]);
    }
}
