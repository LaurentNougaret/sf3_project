<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\CaradvisorBundle;
use CaradvisorBundle\Entity\Pro;
use CaradvisorBundle\Form\ProProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ProController extends Controller
{
    /**
     * @Route("/pro/{proId}", name="pro")
     * @param Pro $proId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Pro $proId)
    {
        return $this->render('@Caradvisor/Pro/home.html.twig', [
            "pro" => $proId,
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
     * @Route("/pro/profile", name="pro_profile")
     */
    public function profileAction(Request $request)
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
        return $this->render('@Caradvisor/Pro/profile.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/pro/reviews/{proId}", name="pro_reviews")
     * @param Pro $proId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function reviewsAction(Pro $proId)
    {
        $proRepository = $this->getDoctrine()->getRepository("CaradvisorBundle:Pro");
        $data = $proRepository->getReview('proId');
        return $this->render('@Caradvisor/Pro/reviews.html.twig', [
            "data" => $data,
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
     * @Route("/info", name="info")
     */
    public function infoAction()
    {
        $proRepository = $this->getDoctrine()->getRepository("CaradvisorBundle:Pro");
        $data = $proRepository->getReview('proId');
        return $this->render('@Caradvisor/Default/info.html.twig', [
            "data" => $data,
        ]);
    }

    public function infoTestAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('CaradvisorBundle:Pro');

        $listProReviews = $repository->getReview();

    }
}
