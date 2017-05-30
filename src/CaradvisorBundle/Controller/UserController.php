<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use CaradvisorBundle\Form\UserSignupType;
use CaradvisorBundle\Form\VehicleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Route("/user/{user_id}", name="user")
     * @param User $user_id
     * @return Response
     */
    public function indexAction(User $user_id)
    {
        return $this->render('@Caradvisor/User/home.html.twig', [
            "user" => $user_id,
        ]);
    }

    /**
     * @Route("/user/car/{user_id}", name="user_car")
     * @param User $user_id
     * @return \Symfony\Component\HttpFoundation\Response
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function carsAction(User $user_id, Request $request )
    {
        $vehicle = new Vehicle();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $vehicle->setUser($user_id);
            $em->persist($vehicle);
            $em->flush();
            //return $this->redirectToRoute('user_car');
        }
        return $this->render('@Caradvisor/User/car.html.twig',[
            'data' =>$user_id->getVehicles(),
            'alfa' =>$user_id->getLastName(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/profile/{user_id}", name="user_profile")
     * @param User $user_id
     * @return Response
     */
    public function profileAction(User $user_id)
    {
        return $this->render('@Caradvisor/User/profile.html.twig',[
            'user' => $user_id
        ]);
    }

    /**
     * @Route("/user/profile/edit/{user_id}", name="user_edit")
     * @param User $user_id
     * @return Response
     */
    public function editAction(User $user_id)
    {
        return $this->render('@Caradvisor/Pro/editprofile.html.twig', [
            'user' => $user_id
        ]);
    }

    /**
     * @Route("/user/reviews/{user_id}", name="user_reviews")
     * @param User $user_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function reviewsAction(User $user_id)
    {
       //$user_idRepository = $this->getDoctrine()->getRepository('CaradvisorBundle:User');
       //$data = $user_idRepository->getReviewUser($user_id->getId());
       return $this->render('@Caradvisor/User/reviews.html.twig', [
           'data' => $user_id->getReviewRepairs(),
           'beta' => $user_id->getReviewBuys(),
       ]);
    }

    /**
     * @Route("/user/settings/{user_id}", name="user_settings")
     * @param User $user_id
     * @return Response
     */
    public function settingsAction(User $user_id)
    {
        return $this->render('@Caradvisor/User/settings.html.twig',[
            'user' => $user_id
        ]);
    }

    /**
     * @Route("/user/settings/password/{user_id}", name="user_password")
     * @param User $user_id
     * @return Response
     */
    public function passwordAction(User $user_id)
    {
        return $this->render('@Caradvisor/User/password.html.twig', [
            'user' => $user_id
        ]);
    }


}