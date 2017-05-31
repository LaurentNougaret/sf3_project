<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Pro;
use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use CaradvisorBundle\Form\ChangePasswordType;
use CaradvisorBundle\Form\Model\ChangePassword;
use CaradvisorBundle\Form\UserType;
use CaradvisorBundle\Form\VehicleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    // Home page for user (professionals & non-professionals)
    /**
     * @Route("/user/{user}", name="user")
     * @param User $user
     * @return Response
     */
    public function indexAction(User $user)
    {
        return $this->render('@Caradvisor/User/home.html.twig', [
            "user" => $user,
        ]);
    }

    // User's profile page: Visualize profile
    /**
     * @Route("/user/profile/{user}", name="user_profile")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profileAction(User $user)
    {

        return $this->render('@Caradvisor/User/profile.html.twig', [
            "user" => $user,
        ]);
    }

    // User's profile page: Edit profile
    /**
     * @Route("/user/profile/edit/{id}", name="user_edit")
     * @param Request $request
     * @param User $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, User $id)
    {
        $editForm = $this->createForm(UserType::class, $id);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_profile', array(
                'user' => $id->getId()
            ));
        }
        return $this->render('@Caradvisor/User/editUser.html.twig', array(
            'edit_form' => $editForm->createView()
        ));
    }

    // User's settings page
    /**
     * @Route("/user/settings/{user}", name="user_settings")
     * @param User $user
     * @return Response
     */
    public function settingsAction(User $user)
    {
        return $this->render('@Caradvisor/User/settings.html.twig',[
            'user' => $user
        ]);
    }

    // User's settings page: Change Password

    /**
     * @Route("/user/settings/password/{user}", name="user_password")
     * @param Request $request
     * @return Response
     */
    public function passwordAction()
    {

        return $this->render('@Caradvisor/User/password.html.twig', [
            'user' => $form->createView(),
        ]);
    }

    // User's show vehicles
    /**
     * @Route("/user/vehicles/{user}", name="user_vehicle")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function carsAction(User $user,Request $request )
    {
        $vehicle = new Vehicle();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $vehicle->setUser($user);
            $em->persist($vehicle);
            $em->flush();
            //return $this->redirectToRoute('user_car');
        }
        return $this->render('@Caradvisor/User/car.html.twig',[
            'data' =>$user->getVehicles(),
            'alfa' =>$user->getLastName(),
            'form' => $form->createView(),
        ]);
    }

    // User's vehicles: Add new vehicle
    /**
     * @Route("/user/vehicle/add/{user}", name="add_vehicle")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function addVehicleAction(Request $request)
    {

    }

    // User's vehicles: Edit vehicle
    /**
     * @Route("/user/vehicle/{user}/edit", name="edit_vehicle")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editVehicleAction(Request $request)
    {

    }

    /**
     * @Route("/user/reviews/{user}", name="user_reviews")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function reviewsAction(User $user)
    {
       //$userRepository = $this->getDoctrine()
        //->getRepository('CaradvisorBundle:User');
       //$data = $userRepository->getReviewUser($user->getId());
       return $this->render('@Caradvisor/User/reviews.html.twig', [
           'data' => $user->getReviewRepairs(),
           'beta' => $user->getReviewBuys(),
       ]);
    }

    // Professionals page: list of establishments of an user
    /**
     * @Route("/user/establishments/{user}", name="user_establishments")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listEstablishmentsAction(User $user)
    {
        return $this->render('@Caradvisor/User/establishments.html.twig', [
            'user' => $user,
        ]);
    }

    // Professionals page: profile of an establishment
    /**
     * @Route("/user/establishments/{user}/{pro}", name="establishment")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showEstablishmentProfileAction(User $user)
    {
        return $this->render('@Caradvisor/Pro/profile.html.twig', [
            'user' => $user,
        ]);
    }

    // Professionals page: edit profile of an establishment
    /**
     * @Route("/user/establishments/{user}/{pro}", name="edit_establishment")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editEstablishmentAction(User $user)
    {
        return $this->render('@Caradvisor/User/editEstab.html.twig', [
            'user' => $user,
        ]);
    }

    // Professionals page: see reviews of an establishment
    /**
     * @Route("/user/establishments/{user}/{pro}/reviews", name="reviews_establishment")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listReviewsEstablishmentAction(User $user, Request $request)
    {
        $estab = new Pro();
        $em = $this->getDoctrine()->getManager();



        return $this->render('@Caradvisor/Pro/reviews.html.twig', [
            'user' => $user,
        ]);
    }
}