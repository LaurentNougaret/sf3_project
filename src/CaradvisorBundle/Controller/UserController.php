<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Answer;
use CaradvisorBundle\Entity\Pro;
use CaradvisorBundle\Entity\ReviewBuy;
use CaradvisorBundle\Entity\ReviewRepair;
use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use CaradvisorBundle\Form\AnswerType;
use CaradvisorBundle\Form\ProProfileType;
use CaradvisorBundle\Form\UserEditProfileType;
use CaradvisorBundle\Form\UserType;
use CaradvisorBundle\Form\VehicleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    // Home page for user (professionals & non-professionals)
    /**
     * @Route("/user", name="user")
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('@Caradvisor/User/home.html.twig', [
            "user" => $user= $this->get('security.token_storage')->getToken()->getUser()
        ]);
    }

    // User's profile page: Visualize profile
    /**
     * @Route("/user/profile", name="user_profile")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profileAction()
    {

        return $this->render('@Caradvisor/User/profile.html.twig', [
            "user" => $user= $this->get('security.token_storage')->getToken()->getUser()
        ]);
    }

    // User's profile page: Edit profile
    /**
     * @Route("/user/profile/edit/{user}", name="user_edit")
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function editAction(Request $request, User $user)
    {
        $editForm = $this->createForm(UserEditProfileType::class, $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_profile', array(
                'user' => $user->getId()
            ));
        }
        return $this->render('@Caradvisor/User/editUser.html.twig', array(
            'edit_form' => $editForm->createView(),
            'user' => $user
        ));
    }

    // User's settings page
    /**
     * @Route("/user/settings", name="user_settings")
     * @return Response
     */
    public function settingsAction()
    {
        return $this->render('@Caradvisor/User/settings.html.twig',[
            'user' => $user= $this->get('security.token_storage')->getToken()->getUser()
        ]);
    }

    // User's settings page: Change Password
    /**
     * @Route("/user/settings/password", name="user_password")
     * @return Response
     */
    public function passwordAction()
    {
        return $this->render('@Caradvisor/User/password.html.twig', [
            'user' => $user= $this->get('security.token_storage')->getToken()->getUser()
        ]);
    }

    // User's show vehicles

    /**
     * @Route("/user/vehicles", name="user_vehicle")
     * @param Request $request
     * @return Response
     */
    public function listCarsAction(Request $request )
    {
        $car = new Vehicle();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(VehicleType::class, $car);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $car->setUser($user= $this->get('security.token_storage')->getToken()->getUser());
            $em->persist($car);
            $em->flush();
        }
        return $this->render('@Caradvisor/User/car.html.twig',[
            'user' => $user= $this->get('security.token_storage')->getToken()->getUser(),
            'data' =>$user->getVehicles(),
            'alfa' =>$user->getLastName(),
            'form' => $form->createView(),

        ]);
    }

    /**
     * @Route("/user/vehicles/detail/{vehicle}", name="detail_car")
     * @param Vehicle $vehicle
     * @return Response
     */
    public function showDetailCarAction(Vehicle $vehicle)
    {
        return $this->render('@Caradvisor/User/detailCar.html.twig', [
            'user' => $user= $this->get('security.token_storage')->getToken()->getUser(),
            'vehicle' => $vehicle,
        ]);
    }



    // User's vehicles: Edit vehicle

    /**
     * @Route("/user/vehicles/edit/{vehicle}", name="edit_vehicle")
     * @param Request $request
     * @param Vehicle $vehicle
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editVehicleAction(Request $request, Vehicle $vehicle)
    {
        $editForm = $this->createForm(VehicleType::class, $vehicle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_vehicle', array(
                'user' => $user= $this->get('security.token_storage')->getToken()->getUser(),
                'vehicle' => $vehicle->getId(),
            ));
        }
        return $this->render('@Caradvisor/User/editCar.html.twig', array(
            'edit_form' => $editForm->createView(),
            'user' => $user= $this->get('security.token_storage')->getToken()->getUser(),
            'vehicle' => $vehicle
        ));


    }

    /**
     * @Route("/user/vehicles/delete/{vehicle}", name="delete_car")
     * @param Vehicle $vehicle
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteCarAction(Vehicle $vehicle)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($vehicle);
        $em->flush();
        return $this->redirectToRoute('user_vehicle', array(
            'vehicle' => $vehicle,
            'user' => $user= $this->get('security.token_storage')->getToken()->getUser(),
        ));
    }


    /**
     * @Route("/user/reviews", name="user_reviews")
     * @return Response
     */
    public function reviewsAction()
    {
       return $this->render('@Caradvisor/Pro/reviews.html.twig', [
           'data' => $user= $this->get('security.token_storage')->getToken()->getUser()->getReviewRepairs(),
           'beta' => $user= $this->get('security.token_storage')->getToken()->getUser()->getReviewBuys(),
           'user' => $user= $this->get('security.token_storage')->getToken()->getUser()
       ]);
    }

    // Professionals page: list of establishments of an user

    /**
     * @Route("/user/establishments", name="user_establishments")
     * @param Request $request
     * @return Response
     */
    public function listEstablishmentsAction(Request $request)
    {
        $establishment = new Pro();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ProProfileType::class, $establishment);
        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $establishment->setUser($user= $this->get('security.token_storage')->getToken()->getUser());
            $em->persist($establishment);
            $em->flush();
        }

        return $this->render('@Caradvisor/User/establishments.html.twig', [
            'user' => $user= $this->get('security.token_storage')->getToken()->getUser(),
            'establishment' => $user->getPros(),
            'form' => $form->createView(),
        ]);
    }

    // Professionals page: profile of an establishment

    /**
     * @Route("/user/establishments/profile/{pro}", name="establishment_profile")
     * @param Pro $pro
     * @return Response
     */
    public function showEstablishmentProfileAction(Pro $pro)
    {
        return $this->render('@Caradvisor/Pro/profile.html.twig', [
            'user' => $user= $this->get('security.token_storage')->getToken()->getUser(),
            'pro' => $pro,
        ]);
    }

    // Professionals page: edit profile of an establishment

    /**
     * @Route("/user/establishments/edit/{pro}", name="edit_establishment")
     * @param Pro $pro
     * @param Request $request
     * @return Response
     */
    public function editEstablishmentAction(Pro $pro, Request $request)
    {
        $editForm = $this->createForm(ProProfileType::class, $pro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('establishment_profile', array(
                'user' => $user= $this->get('security.token_storage')->getToken()->getUser(),
                'pro' => $pro->getId(),
            ));
        }
        return $this->render('@Caradvisor/User/editEstab.html.twig', array(
            'edit_form' => $editForm->createView(),
            'user' => $user= $this->get('security.token_storage')->getToken()->getUser(),
            'pro' => $pro
        ));
    }

    // Professionals page: see reviews of an establishment

    /**
     * @Route("/user/establishments/reviews/{pro}", name="reviews_establishment")
     * @param Pro $pro
     * @return Response
     */
    public function listReviewsEstablishmentAction( Pro $pro)
    {
       return $this->render('@Caradvisor/User/reviewsEstab.html.twig', [
           'data' => $pro->getReviewRepairs(),
           'beta' => $pro->getReviewBuys(),
           'user' => $user= $this->get('security.token_storage')->getToken()->getUser(),
           'pro' =>  $pro,
       ]);
    }

    // Professionals page: answer to a client's review

    /**
     * @Route("/user/establishments/reviews/answer/repair/{user}/{pro}", name="answer_repair")
     * @param User $user
     * @param Pro $pro
     * @param ReviewRepair $reviewRepair
     * @param Request $request
     * @return Response
     */
    public function answerRepairAction(User $user, Pro $pro, ReviewRepair $reviewRepair, Request $request)
    {
        $answer = new Answer();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $answer->setPro($pro);
            $type = $request->request->get('type');
            $id = $request->request->get('id');
            $repair = $em->getRepository('CaradvisorBundle:ReviewRepair')->find($id);
            $answer->setReviewRepair($repair);
            $em->persist($answer);
            $em->flush();

            return $this->redirectToRoute('reviews_establishment', array(
                'user' => $user->getId(),
                'pro' => $pro->getId(),
            ));
        }
        return $this->render('@Caradvisor/User/answerReviewEstabRepair.html.twig', [
            'user' => $user,
            'pro' => $pro,
            'reviewrepair' => $reviewRepair,
            'form' =>$form->createView(),
        ]);
    }

    /**
     * @Route("/user/establishments/reviews/answer/buy/{user}/{pro}", name="answer_buy")
     * @param User $user
     * @param Pro $pro
     * @param ReviewBuy $reviewBuy
     * @param Request $request
     * @return Response
     */
    public function answerBuyAction(User $user, Pro $pro, ReviewBuy $reviewBuy, Request $request)
    {
        $answer = new Answer();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $answer->setPro($pro);
            $type = $request->request->get('type');
            $id = $request->request->get('id');
            $buy = $em->getRepository('CaradvisorBundle:ReviewBuy')->find($id);
            $answer->setReviewBuy($buy);
            $em->persist($answer);
            $em->flush();

            return $this->redirectToRoute('reviews_establishment', array(
                'user' => $user->getId(),
                'pro' => $pro->getId(),
            ));
        }
        return $this->render('@Caradvisor/User/answerReviewEstabBuy.html.twig', [
            'user' => $user,
            'pro' => $pro,
            'reviewbuy' => $reviewBuy,
            'form' =>$form->createView(),
        ]);
    }

}