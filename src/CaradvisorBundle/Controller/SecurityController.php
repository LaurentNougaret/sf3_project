<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Form\ChangePasswordType;
use CaradvisorBundle\Form\ForgottenPasswordType;
use CaradvisorBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setAddress("");
            $user->setCity("");
            $user->setPostalCode("");
            $user->setPhone(null);
            $user->setBirthDate(new \DateTime());
            $user->setMailingList(0);
            $user->setIsActive(1);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $email = \Swift_Message::newInstance()
                ->setSubject("Caradvisor : Confirmation d'inscription")
                ->setFrom("apitchen@gmail.com")
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        "@Caradvisor/Mail/registration.html.twig", [
                            'userName' => $user->getUserName(),
                            'url' => $this->generateUrl("home", [], UrlGeneratorInterface::ABSOLUTE_URL)
                    ]),
                    'text/html'
                );

            $this->get('mailer')->send($email);
            $this->addFlash("notice-green", "Un email vous a été envoyé, vous pouvez maintenant vous connecter.");

            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Security/signup.html.twig', [
            'form'      => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/forgotten", name="forgotten")
     */
    public function forgottenAction(Request $request) {
        $user = new User();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ForgottenPasswordType::class, $user);
        $form->handleRequest($request);
        $message = "";
        if ($form->isSubmitted()) {
            /** @var User $newUser */
            $newUser= $em->getRepository("CaradvisorBundle:User")->findOneBy(["userName" => $user->getUserName()]);
            if ($newUser === null) {
                $message = "Nous n'avons pas trouvé cet utilisateur";
            } else {
                $newUser->setPasswordChangeToken($newUser->generateToken());
                $dueDate = new \DateTime("now");
                $dueDate->add(new \DateInterval("P1D"));
                $newUser->setPasswordChangeLimitDate($dueDate);
                $em->persist($newUser);
                $em->flush();
                $email = \Swift_Message::newInstance()
                    ->setSubject('Caradvisor: réinitialisation du mot de passe')
                    ->setFrom('apitchen@gmail.com')
                    ->setTo($newUser->getEmail())
                    ->setBody(
                        $this->renderView("@Caradvisor/Mail/forgottenPassword.html.twig", [
                            "resetPasswordLink" => $this->generateUrl("reset", [
                                "token" => $newUser->getPasswordChangeToken(),
                                ],
                                UrlGeneratorInterface::ABSOLUTE_URL),
                            ]),
                    'text/html'
                    );
                $this->get('mailer')->send($email);
                $this->addFlash("notice", "Un mail a été envoyé à l'adresse de l'utilisateur.");
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
    public function resetPasswordAction (Request $request, $token)
    {
        $message = "";
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("CaradvisorBundle:User")->findOneBy(["passwordChangeToken" => $token]);
        $today = new \DateTime("now");
        if ($user !== null && $user->getPasswordChangeLimitDate() > $today) {
            $user->setPassword("");
            $form = $this->createForm(ChangePasswordType::class, $user);
            $form->handleRequest($request);
            if ($form->isValid() && $form->isSubmitted()) {
                $password = $user->getPassword();
                $verificationPassword = $request->request->get("caradvisor_bundle_change_password_type")["passwordCompare"];
                if ($password === $verificationPassword) {
                    $encoder = $this->get('security.password_encoder');
                    $encoded = $encoder->encodePassword($user, $user->getPassword());
                    $user->setPassword($encoded);
                    $user->setPasswordChangeLimitDate(null);
                    $user->setPasswordChangeToken(null);
                    $em->flush();
                    $this->addFlash("notice", "Votre mot de passe a bien été modifié.");
                    return $this->redirectToRoute('home');
                } else {
                    $message = "Les mots de passe ne correspondent pas.";
                }
            }
            return $this->render("@Caradvisor/Security/passwordProcess.html.twig", [
                "form" => $form->createView(),
                "message" => $message,
            ]);
            } else {
            $this->addFlash("notice", "Cette demande de réinitialisation de mot de passe n'est plus valide.");
            return $this->redirectToRoute('home');
        }
    }
}
