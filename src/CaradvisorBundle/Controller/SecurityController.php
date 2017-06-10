<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\User;
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
            /*$user->setAddress(null);
            $user->setCity(null);
            $user->setPostalCode(null);
            $user->setPhone(null);
            $user->setBirthDate(null); */
            $user->setMailingList(null);
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
                        "@Caradvisor/Security/registration.html.twig", [
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
}
