<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Form\UserSignupType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
     * @param Request $request
     * @return  Response
     * @Route("/user/signup", name="user_signup")
     */
    public function signupAction(Request $request)
    {
        $user = new User();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(UserSignupType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user');
        }
        return $this->render('@Caradvisor/User/signup.html.twig',[
            'form' => $form->createview()
        ]);
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
        $em = $this->getDoctrine()->getManager();
        $reviewRepairs = $em->getRepository('CaradvisorBundle:ReviewRepair')->findAll();
        $reviewBuys = $em->getRepository('CaradvisorBundle:ReviewBuy')->findAll();
        return $this->render('@Caradvisor/User/reviews.html.twig', array(
            'reviewRepair' => $reviewRepairs,
            'reviewBuy' => $reviewBuys,
        ));
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