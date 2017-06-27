<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Admin;
use CaradvisorBundle\Form\AdminType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * @Route ("/admin/login", name="admin_login")
     * @return Response
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();         // get the login error if there is one
        $lastUsername = $authenticationUtils->getLastUsername();         // last username entered by the user

        return $this->render('@Caradvisor/Admin/Default/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route("/admin/dashboard", name="dashboard")
     * @return Response
     */
    public function viewDashboard()
    {
        return $this->render('@Caradvisor/Admin/Default/home.html.twig'
        );
    }

    /**
     * @Route("/register", name="admin_register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function registerAction(Request $request)
    {
        $admin = new Admin();
        $form = $this->createForm(AdminType::class, $admin);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $password = $this->get('security.password_encoder')
                ->encodePassword($admin, $admin->getPlainPassword());
            $admin->setPassword($password);

            $admin->setRoles(['ROLE_ADMIN']);

            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();

            return $this->redirectToRoute('admin_login');
        }
        return $this->render(
            '@Caradvisor/Admin/Default/registerAdmin.html.twig',
            array('form' => $form->createView())
        );
    }

}
