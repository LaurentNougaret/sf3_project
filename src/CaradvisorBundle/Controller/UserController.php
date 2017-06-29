<?php
namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Answer;
use CaradvisorBundle\Entity\Pro;
use CaradvisorBundle\Entity\ReviewBuy;
use CaradvisorBundle\Entity\ReviewRepair;
use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use CaradvisorBundle\Form\AnswerType;
use CaradvisorBundle\Form\ForgottenPasswordType;
use CaradvisorBundle\Form\ProProfileType;
use CaradvisorBundle\Form\UserType;
use CaradvisorBundle\Form\VehicleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
            "user" => $this->getUser(),
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
            "user" => $this->getUser(),
            "userProfile" => $this->getUser()->getUserProfile(),
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
        $currentUser = $this->getUser();
        $editForm = $this->createForm(UserType::class, $currentUser);
        $editForm->remove('roles');
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {

            /** @var File $file */
            $file = $currentUser->getPicture();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $targetDirectory = $this->getParameter('avatar_directory');
            $file->move($targetDirectory, $fileName);
            $currentUser->setPicture($fileName);

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('user_profile', array(
                "user" => $currentUser,
            ));
        }
        return $this->render('@Caradvisor/User/editUser.html.twig', array(
            'edit_form' => $editForm->createView(),
            'user' => $user = $currentUser,
        ));
    }
    // User's settings page
    /**
     * @Route("/user/settings", name="user_settings")
     * @return Response
     */
    public function settingsAction()
    {
        return $this->render('@Caradvisor/User/settings.html.twig', [
            'user' => $this->getUser(),
        ]);
    }
    // User's settings page: Change Password
    /**
     * @Route("/user/settings/password", name="user_password")
     * @return Response
     * @Method({"GET", "POST"})
     */
    public function changePasswordAction(Request $request)
    {
        $user = new User();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ForgottenPasswordType::class, $user);
        $form->handleRequest($request);
        $message = "";
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $newUser */
            $newUser = $em->getRepository("CaradvisorBundle:User")->findOneBy(["email" => $user->getEmail()]);
            if (null === $newUser) {
                $message = "Nous n'avons pas trouvé cet utilisateur";
            } else {
                $newUser->setToken($newUser->generateToken());
                $dueDate = new \DateTime("now");
                $dueDate->add(new \DateInterval("P1D"));
                $newUser->setDateLimitToken($dueDate);
                $em->persist($newUser);
                $em->flush();
                $email = \Swift_Message::newInstance()
                    ->setSubject('Caradvisor : réinitialisation du mot de passe')
                    ->setFrom($this->getParameter('mailer_address'))
                    ->setTo($newUser->getEmail())
                    ->setBody(
                        $this->renderView("@Caradvisor/Mail/forgottenPassword.html.twig", [
                            "resetPasswordLink" => $this->generateUrl("reset", [
                                "token" => $newUser->getToken(),
                            ],
                                UrlGeneratorInterface::ABSOLUTE_URL),
                        ]),
                        'text/html'
                    );
                $this->get('mailer')->send($email);
                $this->addFlash("notice-green", "Un mail a été envoyé à l'adresse de l'utilisateur.");
                return $this->redirectToRoute('home');
            }
        }
        return $this->render("@Caradvisor/Security/passwordProcess.html.twig", [
            "form" => $form->createView(),
            "userName" => $user->getUserName(),
            "message" => $message,
        ]);
    }

    // User's show vehicles
    /**
     * @Route("/user/vehicles", name="user_vehicle")
     * @param Request $request
     * @return Response
     */
    public function listCarsAction(Request $request)
    {
        $car = new Vehicle();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(VehicleType::class, $car);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $car->setUser($this->getUser());
            $em->persist($car);
            $em->flush();
        }
        return $this->render('@Caradvisor/User/car.html.twig', [
            'user' => $this->getUser(),
            'data' =>$this->getUser()->getVehicles(),
            'alfa' =>$this->getUser()->getLastName(),
            'form' => $form->createView(),
        ]);
    }
    // User's vehicles: Add new vehicle
    /**
     * @Route("/user/vehicles/detail/{vehicle}", name="detail_car")
     * @param Vehicle $vehicle
     * @return Response
     */
    public function showDetailCarAction(Vehicle $vehicle)
    {
        return $this->render('@Caradvisor/User/detailCar.html.twig', [
            'user' => $this->getUser(),
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
                'user' => $this->getUser(),
                'vehicle' => $vehicle->getId(),
            ));
        }
        return $this->render('@Caradvisor/User/UserCar/editCar.html.twig', array(
            'edit_form' => $editForm->createView(),
            'user' => $this->getUser(),
            'vehicle' => $vehicle
        ));
    }
    // User's vehicles: Delete vehicle
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
            'user' => $this->getUser(),
        ));
    }
    /**
     * @Route("/user/reviews", name="user_reviews")
     * @return Response
     */
    public function reviewsAction()
    {
        return $this->render('@Caradvisor/User/UserReviews.html.twig', [
            'data' => $this->getUser()->getReviewRepairs(),
            'beta' => $this->getUser()->getReviewBuys(),
            'user' => $this->getUser(),
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
        if ($form->isSubmitted() && $form->isValid()) {
            $establishment->setUser($this->getUser());
            $em->persist($establishment);
            $em->flush();
        }
        return $this->render('@Caradvisor/User/establishments.html.twig', [
            'user' => $this->getUser(),
            'establishment' => $this->getUser()->getPros(),
            'form' => $form->createView(),
        ]);
    }
    // Professionals page: profile of an establishment
    /**
     * @param Pro $pro
     * @Route("/user/establishments/profile/{pro}", name="establishment_profile")
     * @return Response
     */
    public function showEstablishmentProfileAction(Pro $pro)
    {
        return $this->render('@Caradvisor/Pro/profile.html.twig', [
            'user' => $this->getUser(),
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

            /** @var File $file */
            $file = $pro->getPicture();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $targetDirectory = $this->getParameter('estabpic_directory');
            $file->move($targetDirectory, $fileName);
            $pro->setPicture($fileName);

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('establishment_profile', array(
                'user' => $this->getUser(),
                'pro' => $pro->getId(),
            ));
        }
        return $this->render('@Caradvisor/User/UserEstablishment/editEstab.html.twig', array(
            'edit_form' => $editForm->createView(),
            'user' => $this->getUser(),
            'pro' => $pro
        ));
    }
    // Professionals page: see reviews of an establishment
    /**
     * @Route("/user/establishments/reviews/{pro}", name="reviews_establishment")
     * @param Pro $pro
     * @return Response
     */
    public function listReviewsEstablishmentAction(Pro $pro)
    {
        return $this->render('@Caradvisor/User/UserEstablishment/estabReviews.html.twig', [
            'data' => $pro->getReviewRepairs(),
            'beta' => $pro->getReviewBuys(),
            'user' => $this->getUser(),
            'pro' =>  $pro,
        ]);
    }
    // Professionals page: answer to a client's review
    /**
     * @Route("/user/establishments/reviews/answer/repair/{pro}", name="answer_repair")
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
        return $this->render('@Caradvisor/User/UserEstablishment/answerReviewEstabRepair.html.twig', [
            'user' => $user->getId(),
            'pro' => $pro,
            'reviewrepair' => $reviewRepair,
            'form' =>$form->createView(),
        ]);
    }
    /**
     * @Route("/user/establishments/reviews/answer/buy/{pro}", name="answer_buy")
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
        return $this->render('@Caradvisor/User/UserEstablishment/answerReviewEstabRepair.html.twig', [
            'user' => $user->getId(),
            'pro' => $pro,
            'reviewbuy' => $reviewBuy,
            'form' =>$form->createView(),
        ]);
    }
}
