<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Admin;
use CaradvisorBundle\Entity\Pro;
use CaradvisorBundle\Form\AdminType;
use CaradvisorBundle\Repository\ProRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * @Route ("/admin/login", name="admin_login")
     * @param Request $request
     * @return Response
     */
    public function loginAction(Request $request)
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
     */
    public function viewDashboard()
    {
        return $this->render('@Caradvisor/Admin/Default/home.html.twig');
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

            return $this->redirectToRoute('dashboard');
        }
        return $this->render(
            '@Caradvisor/Admin/Default/registerAdmin.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @internal param $page
     * @param int $page
     * @return Response
     * @Route("/admin/etablissements/{page}", name="admin_etabs")
     */
    public function listEstabsAction($page = 1)
    {
        $repo = $this->getDoctrine()->getRepository(Pro::class);
        $maxResults = 5;
        $proCount = $repo->totalEstabs();

        $pagination = [
            'page'          => $page,
            'route'         => 'admin_etabs',
            'pages_count'   => ceil($proCount / $maxResults),
            'route_params'  => [],
        ];

        $pros = $repo->listEstabs($page, $maxResults);

        return $this->render('@Caradvisor/Admin/Default/adminListEstabs.html.twig', [
            'pros'          => $pros,
            'pagination'    => $pagination,
        ]);
    }

    /**
     * @Route("/admin/etablissements/detail-establissements/{pros}", name="detail_pro")
     * @param Pro $pros
     * @return Response
     */
    public function showEstabsAction(Pro $pros)
    {
        return $this->render('@Caradvisor/Admin/Default/adminDetailEstabs.html.twig', [
            'pro'   => $pros,
        ]);
    }

    /**
     * @Route("/admin/users/desactivate/{pros}", name="desactivate_pro")
     * @param Pro $pros
     * @return Response
     */
    public function desactivateEstabAction(Pro $pros)
    {
        $em = $this->getDoctrine()->getManager();
        $pros->setIsActive(false);
        $em->persist($pros);
        $em->flush();
        return $this->redirectToRoute("admin_etabs", [
            'pros' => $pros
        ]);
    }

    /**
     * @Route("/admin/users/activate/{pros}", name="activate_pro")
     * @param Pro $pros
     * @return Response
     */
    public function activateEstabAction(Pro $pros)
    {
        $em = $this->getDoctrine()->getManager();
        $pros->setIsActive(true);
        $em->persist($pros);
        $em->flush();
        return $this->redirectToRoute("admin_etabs", [
            'pros' => $pros
        ]);

    }
}
