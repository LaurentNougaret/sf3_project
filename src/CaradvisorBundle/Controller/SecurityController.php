<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Pro;
use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use CaradvisorBundle\Form\ForgottenPasswordType;
use CaradvisorBundle\Form\ProProfileType;
use CaradvisorBundle\Form\ResetPasswordType;
use CaradvisorBundle\Form\UserType;
use CaradvisorBundle\Form\VehicleType;
use Faker\Provider\DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Validator\Constraints\Url;

class SecurityController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        //get error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        //last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@Caradvisor/Security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }


    /**
     * @Route("/signup", name="user_signup")
     * @param Request $request
     * @return Response
     */
    public function signUpAction(Request $request)
    {
        $user = new User();

        $signup = $request->getSession();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            /**
             * Token for signup validation
             */
            $user->setToken(sha1(microtime() . $user->getEmail()));
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());

            $user->setPassword($password);

            $dateLimitToken = new \DateTime("now");
            $dateLimitToken->add(new \DateInterval("P1D"));
            $user->setDateLimitToken($dateLimitToken);

            $signup->set('role', $user->getRoles());

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $signup->set('id', $user->getId());

            $email = \Swift_Message::newInstance()
                ->setSubject("Caradvisor : Confirmation d'inscription")
                ->setFrom("apitchen@gmail.com")
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView("@Caradvisor/Mail/signupMail.html.twig", [
                        'userName'         => $user->getUserName(),
                        'url'              => $this->generateUrl("home", [], UrlGeneratorInterface::ABSOLUTE_URL),
                        'confirmationLink' => $this->generateUrl("signup_confirmation", [
                            'token' => $user->getToken(),
                            ], UrlGeneratorInterface::ABSOLUTE_URL
                        )
                    ]),
                    'text/html'
                );

            $this->get('mailer')->send($email);
            $this->addFlash("notice-green", "Un email vous a été envoyé, vous pouvez maintenant vous connecter.");

            return $this->redirectToRoute('signupSecond');
        }
        return $this->render('@Caradvisor/Security/signup.html.twig', [
            'form'      => $form->createView(),
        ]);
    }

    /**
     * @return RedirectResponse|Response
     * @Route("/signup-2", name="signupSecond")
     * @param Request $request
     */
    public function signupSecondAction(Request $request)
    {
        $signup = $request->getSession();

        $role = $signup->get('role');
        $id = $signup->get('id');

        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if ($role == ['ROLE_PART']) {
            $vehicle = new Vehicle();

            $form = $this->createForm(VehicleType::class, $vehicle);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $vehicle->setUser($user);
                $em = $this->getDoctrine()->getManager();
                $em->persist($vehicle);
                $em->flush();

                return $this->redirectToRoute('home');
            }
            return $this->render('@Caradvisor/Security/signupSecond.html.twig', [
                'form'      => $form->createView(),
                'vehicle'   => $vehicle,
            ]);
        }

        $pro = new Pro();

        $form = $this->createForm(ProProfileType::class, $pro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pro->setUser($user);
            $pro->setRatingPro(0);
            $pro->setPicture("");
            $em = $this->getDoctrine()->getManager();
            $em->persist($pro);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Security/signupSecond.html.twig', [
            'form'      => $form->createView(),
            'pro'       => $pro,
        ]);
    }

    /**
     * @param Request $request
     * @param $token
     * @return RedirectResponse
     * @Route("/signup-confirmation/{token}", name="signup_confirmation")
     */
    public function signupConfirmation($token)
    {
        $time = new \DateTime();
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(["token" => $token]);
        if ($user !== null && $user->getDateLimitToken() > $time) {
            $user->setMailingList(true);
            $user->setIsActive(true);
            $user->setToken(null);
            $user->setDateLimitToken(null);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash("notice-green", "Votre compte a bien été enregistré, vous pouvez maintenant vous connecter.");
        } else {
            $this->addFlash("notice-red", "Votre compte n'a pas été enregistré, veuillez vous réinscrire.");
        }
        return $this->redirectToRoute("home");
    }


    /**
     * @param Request $request
     * @return Response
     * @Route("/forgotten", name="forgotten")
     */
    public function forgottenAction(Request $request)
    {
        $user = new User();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ForgottenPasswordType::class, $user);
        $form->handleRequest($request);
        $message = "";
        if ($form->isSubmitted() && $form->isValid()){
            /** @var User $newUser */
            $newUser = $em->getRepository("CaradvisorBundle:User")->findOneBy(["email" => $user->getEmail()]);
            if (null === $newUser){
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
                    ->setFrom('apitchen@gmail.com')
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


    /**
     * @param Request $request
     * @param string $token
     * @Route("/reset/{token}", name="reset")
     * @return Response
     */
    public function resetPasswordAction(Request $request, $token)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("CaradvisorBundle:User")->findOneBy(["token" => $token]);
        $today = new \DateTime("now");
        if (null !== $user && $user->getDateLimitToken() > $today) {
            $user->setPassword("");
            $form = $this->createForm(ResetPasswordType::class, $user);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $password = $user->getPlainPassword();
                $encoder = $this->get('security.password_encoder');
                $encoded = $encoder->encodePassword($user, $password);
                $user->setPassword($encoded);
                $user->setDateLimitToken(null);
                $user->setToken(null);
                $em->flush();
                $this->addFlash("notice-green", "Votre mot de passe a bien été modifié.");
                return $this->redirectToRoute("home");
            }
            return $this->render("@Caradvisor/Security/passwordReset.html.twig", [
                "form" => $form->createView(),
            ]);
        } else {
            $this->addFlash("notice", "Cette demande de réinitialisation de mot de passe n'est pas valide.");
            return $this->redirectToRoute("home");
        }
        return $this->redirectToRoute("home");
    }
}
