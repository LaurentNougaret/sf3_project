<?php

namespace CaradvisorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("/user", name="user")
     */
    public function indexAction()
    {
        return $this->render('@Caradvisor/User/home.html.twig');
    }
    /**
     * @Route("/user/signup", name="user_signup")
     */
    public function signupAction()
    {
        return $this->render('@Caradvisor/User/signup.html.twig');
    }
    /**
     * @Route("/user/car", name="user_car")
     */
    public function carsAction()
    {
        return $this->render('@Caradvisor/User/car.html.twig');
    }
    /**
     * @Route("/user/profile", name="user_profile")
     */
    public function profileAction()
    {
        return $this->render('@Caradvisor/User/profile.html.twig');
    }
    /**
     * @Route("/user/reviews", name="user_reviews")
     */
    public function reviewsAction()
    {
        return $this->render('@Caradvisor/User/reviews.html.twig');
    }
    /**
     * @Route("/user/settings", name="user_settings")
     */
    public function settingsAction()
    {
        return $this->render('@Caradvisor/User/settings.html.twig');
    }
    /**
     * @Route("/user/settings/password", name="user_password")
     */
    public function passwordAction()
    {
        return $this->render('@Caradvisor/User/password.html.twig');
    }
}