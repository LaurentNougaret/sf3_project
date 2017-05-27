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
     * @Route("/pro/edit/{id}", name="pro_edit")
     * @param Request $request
     * @param Pro $pro
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Pro $pro)
    {
        $editForm = $this->createForm(ProProfileType::class, $pro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pro_profile', array(
                'pro' => $pro->getId()
            ));
        }
        return $this->render('@Caradvisor/Pro/editprofile.html.twig', array(
            'edit_form' => $editForm->createView()
        ));
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

    /**
     * @Route("/pro/profile/{pro}", name="pro_profile")
     */
    public function profileAction(Pro $pro)
    {

        return $this->render('@Caradvisor/Pro/profile.html.twig', [
            "pro" => $pro,
        ]);
    }
}
