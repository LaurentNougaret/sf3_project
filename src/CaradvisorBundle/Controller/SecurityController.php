<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller
{

    /**
     * @return Response
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        //get error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        //last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@Caradvisor/Default/login.html.twig', [
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
            $user->setGender("Non précisé");
            $user->setAddress("");
            $user->setCity("");
            $user->setPostalCode("");
            $user->setPhone("");
            $user->setBirthDate(new \DateTime());
            $user->setMailingList("");
            $user->setIsActive(1);


            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $email = \Swift_Message::newInstance()
                ->setSubject("Caradvisor : Confirmation d'inscription")
                ->setFrom("contact@caradvisor.com")
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        "@Caradvisor/Default/registration.html.twig"),
                    'text/html'
                );

            $this->get('mailer')->send($email);



            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Default/signup.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
