<?php

namespace CaradvisorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProController extends Controller
{
    /**
     * @Route("/pro", name="pro")
     */
    public function indexAction()
    {
        return $this->render('@Caradvisor/Pro/home.html.twig');
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
    public function profileAction()
    {
        return $this->render('@Caradvisor/Pro/profile.html.twig');
    }
    /**
     * @Route("/pro/reviews", name="pro_reviews")
     */
    public function reviewsAction()
    {
        return $this->render('@Caradvisor/Pro/reviews.html.twig');
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
