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
     * @Route("/user/{userId}", name="user")
     */
    public function indexAction(User $userId)
    {
        return $this->render('@Caradvisor/User/home.html.twig', [
            "user" => $userId,
        ]);
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
     * @Route("/user/car/{user}", name="user_car")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function carsAction(User $user)
    {

        return $this->render('@Caradvisor/User/car.html.twig',[
            'data' =>$user->getVehicles()
        ]);
    }
    /**
     * @Route("/user/profile", name="user_profile")
     */
    public function profileAction()
    {
        return $this->render('@Caradvisor/User/profile.html.twig');
    }
    /**
     * @Route("/user/reviews/{user}", name="user_reviews")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function reviewsAction(User $user)
    {
       //$userRepository = $this->getDoctrine()->getRepository('CaradvisorBundle:User');
       //$data = $userRepository->getReviewUser($user->getId());
       return $this->render('@Caradvisor/User/reviews.html.twig', [
           'data' => $user->getReviewRepairs(),
           'beta' => $user->getReviewBuys(),
       ]);
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