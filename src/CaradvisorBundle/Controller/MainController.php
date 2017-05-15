<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MainController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $reviews = $this->getDoctrine()->getRepository('CaradvisorBundle:Review')->findAll();
        return $this->render('@Caradvisor/Default/home.html.twig', [
            'reviews' => $reviews,
        ]);
    }
    /**
     * @Route("/results", name="results")
     */
    public function resultAction()
    {
        return $this->render('@Caradvisor/Default/results.html.twig');
    }
    /**
     * @Route("/info", name="info")
     */
    public function infoAction()
    {
        return $this->render('@Caradvisor/Default/info.html.twig');
    }
    /**
     * @Route("/review/new", name="review_new")
     */
    public function reviewNewAction()
    {
        return $this->render('@Caradvisor/Reviews/new.html.twig');
    }
    /**
     * @Route("/review/used", name="review_used")
     */
    public function reviewUsedAction()
    {
        return $this->render('@Caradvisor/Reviews/used.html.twig');
    }
    /**
     * @Route("/review/repair", name="review_repair")
     */
    public function reviewRepairAction()
    {
        return $this->render('@Caradvisor/Reviews/repair.html.twig');
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('@Caradvisor/Default/contact.html.twig');
    }
    /**
     * @Route("/legal", name="legal")
     */
    public function legalAction()
    {
        return $this->render('@Caradvisor/Default/legal.html.twig');
    }
    /**
     * @Route("/cgu", name="cgu")
     */
    public function cguAction()
    {
        return $this->render('@Caradvisor/Default/cgu.html.twig');
    }
}
