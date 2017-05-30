<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Pro;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


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

    /* /**
     * @Route("/pro/edit/{id}", name="pro_edit")
     * @param Request $request
     * @param Pro $pro
     * @return \Symfony\Component\HttpFoundation\Response
     *
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
    }*/
}
