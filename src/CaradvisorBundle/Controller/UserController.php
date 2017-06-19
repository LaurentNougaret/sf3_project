<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Answer;
use CaradvisorBundle\Entity\Pro;
use CaradvisorBundle\Entity\ReviewBuy;
use CaradvisorBundle\Entity\ReviewRepair;
use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use CaradvisorBundle\Form\AnswerType;
use CaradvisorBundle\Form\ChangePasswordType;
use CaradvisorBundle\Form\ProProfileType;
use CaradvisorBundle\Form\UserType;
use CaradvisorBundle\Form\VehicleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

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
            "user" => $user = $this->get('security.token_storage')->getToken()->getUser()
        ]);
    }

    // User's profile page: Visualize profile
    /**
     * @Route("/user/profile", name="user_profile")
     * @return Response
     */
    public function profileAction()
    {

        return $this->render('@Caradvisor/User/profile.html.twig', [
            "user" => $user = $this->get('security.token_storage')->getToken()->getUser(),
            "userProfile" => $user->getUserProfile(),
        ]);
    }

    // User's profile page: Edit profile

    /**
     * @Route("/user/profile/edit", name="user_edit")
     * @param Request $request
     * @return Response
     */
    public function editAction(Request $request)
    {
        $editForm = $this->createForm(UserType::class, $user = $this->get('security.token_storage')->getToken()->getUser());
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_profile', array(
                "user" => $user = $this->get('security.token_storage')->getToken()->getUser()
            ));
        }
        return $this->render('@Caradvisor/User/editUser.html.twig', array(
            'edit_form' => $editForm->createView(),
            'user' => $user = $this->get('security.token_storage')->getToken()->getUser()
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
            'user' => $user = $this->get('security.token_storage')->getToken()->getUser()
        ]);
    }

    // User's settings page: Change Password

    /**
     * @Route("/user/settings/password/{user}", name="user_password")
     * @param Request $request
     * @return Response
     */
    public function changePasswordAction(Request $request)
    {
        $user = new User();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ChangePasswordType::class, $user);
        $form->handleRequest($request);
        $message = "";

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $user->getPassword();
            $verificationPassword = $request->request->get("caradvisor_bundle_reset_password_type")["newPassword"];
            if ($password === $verificationPassword) {
                $encoder = $this->get('security.password_encoder');
                $encoded = $encoder->encodePassword($user, $user->getPassword());
                $user->setPassword($encoded);
                $em->flush();
                $this->addFlash("notice", "Votre mot de passe a bien été modifié.");
                return $this->redirectToRoute("home");
            } else {
                $message = "Les mots de passe ne correspondent pas.";
            }
        return $this->render('CaradvisorBundle:Security:passwordReset.html.twig', [
            'form' => $form->createView(),
            "message" => $message,
            ]);
        }
        return $this->redirectToRoute("home");
    }

    // User's show vehicles

    /**
     * @Route("/user/vehicles/{user}", name="user_vehicle")
     * @param User $user
     * @param Vehicle $vehicle
     * @param Request $request
     * @return Response
     */
    public function listCarsAction(User $user, Vehicle $vehicle, Request $request )
    {
        $car = new Vehicle();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(VehicleType::class, $car);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $car->setUser($user);
            $em->persist($car);
            $em->flush();
        }
        return $this->render('@Caradvisor/User/car.html.twig',[
            'user' => $user,
            'vehicle' => $vehicle,
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
     * @Route("/user/vehicles/detail/{user}/{vehicle}", name="detail_car")
     * @param User $user
     * @param Vehicle $vehicle
     * @return Response
     */
    public function showDetailCarAction(User $user, Vehicle $vehicle)
    {
        return $this->render('@Caradvisor/User/detailCar.html.twig', [
            'user' => $user,
            'vehicle' => $vehicle,
        ]);
    }

    // User's vehicles: Edit vehicle

    /**
     * @Route("/user/vehicles/edit/{user}/{vehicle}", name="edit_vehicle")
     * @param Request $request
     * @param User $user
     * @param Vehicle $vehicle
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editVehicleAction(Request $request, User $user, Vehicle $vehicle)
    {
        $editForm = $this->createForm(VehicleType::class, $vehicle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_vehicle', array(
                'user' => $user->getId(),
                'vehicle' => $vehicle->getId(),
            ));
        }
        return $this->render('@Caradvisor/User/editCar.html.twig', array(
            'edit_form' => $editForm->createView(),
            'user' => $user,
            'vehicle' => $vehicle
        ));
    }

    /**
     * @Route("/user/vehicles/delete/{user}/{vehicle}", name="delete_car")
     * @param Vehicle $vehicle
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteCarAction(Vehicle $vehicle, User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($vehicle);
        $em->flush();
        return $this->redirectToRoute('user_vehicle', array(
            'vehicle' => $vehicle,
            'user' => $user->getId(),
        ));
    }

    /**
     * @Route("/user/reviews/{user}", name="user_reviews")
     * @param User $user
     * @return Response
     */
    public function reviewsAction(User $user)
    {
       return $this->render('@Caradvisor/Pro/reviews.html.twig', [
           'data' => $user->getReviewRepairs(),
           'beta' => $user->getReviewBuys(),
           'user' => $user,
       ]);
    }

    // Professionals page: list of establishments of an user

    /**
     * @Route("/user/establishments", name="user_establishments")
     * @return Response
     */
    public function listEstablishmentsAction()
    {
        return $this->render('@Caradvisor/User/establishments.html.twig', [
            'user' => $user = $this->get('security.token_storage')->getToken()->getUser(),
            'establishment' => $user->getPros(),
        ]);
    }

    // Professionals page: profile of an establishment

    /**
     * @Route("/user/establishments/profile", name="establishment_profile")
     * @return Response
     */
    public function showEstablishmentProfileAction()
    {
        return $this->render('@Caradvisor/Pro/profile.html.twig', [
            'user' => $user = $this->get('security.token_storage')->getToken()->getUser(),
        ]);
    }

    // Professionals page: edit profile of an establishment

    /**
     * @Route("/user/establishments/edit/{user}/{pro}", name="edit_establishment")
     * @param Request $request
     * @param Pro $pro
     * @param User $user
     * @return Response
     */
    public function editEstablishmentAction(Request $request, Pro $pro, User $user)
    {
        $editForm = $this->createForm(ProProfileType::class, $pro);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('establishment_profile', array(
                'user' => $user->getId(),
                'pro' => $pro->getId(),
            ));
        }
        return $this->render('@Caradvisor/User/editEstab.html.twig', array(
            'edit_form' => $editForm->createView(),
            'user' => $user,
            'pro' => $pro
        ));
    }

    // Professionals page: see reviews of an establishment

    /**
     * @Route("/user/establishments/reviews/{user}/{pro}", name="reviews_establishment")
     * @param User $user
     * @param Pro $pro
     * @return Response
     */
    public function listReviewsEstablishmentAction(User $user, Pro $pro)
    {
       return $this->render('@Caradvisor/User/reviewsEstab.html.twig', [
           'data' => $pro->getReviewRepairs(),
           'beta' => $pro->getReviewBuys(),
           'user' => $user,
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