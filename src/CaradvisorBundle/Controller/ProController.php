<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Pro;
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
        $pro = new Pro();
        $form = $this->createForm(ProProfileType::class, $pro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pro);
            $em->flush();

            return $this->redirectToRoute('pro');
        }
        return $this->render('@Caradvisor/Pro/profile.html.twig', [
            "form" => $form->createView(),
            "pro" => $pro
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
            "pro" => $pro,
        ]);
    }
    /**
     * @Route("/pro/settings", name="pro_settings")
     */
    public function settingsAction()
    {
        return $this->render('@Caradvisor/Pro/settings.html.twig');
    }
    /**
     * @Route("/pro/settings/password", name="pro_password")
     */
    public function passwordAction()
    {
        return $this->render('@Caradvisor/Pro/password.html.twig');
    }
    /**
     * @Route("/pro/info", name="pro_info")
     */
    public function infoAction()
    {
        return $this->render('@Caradvisor/Default/info.html.twig');
    }
}
