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
     * @Route ("/admin", name="admin")
     * @param Request $request
     * @return Response
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@Caradvisor/Admin/Default/test.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
        /*return $this->render('@Caradvisor/Admin/Default/test.html.twig', [
        ]);*/
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

            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();

            return $this->redirectToRoute('admin');
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
     * @Route("/admin/etabs", name="admin_etabs")
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
     * @Route("/admin/etabs/detail-estabs{pro}", name="detail_pro")
     * @param Pro $pro
     * @return Response
     */
    public function showEstabsAction(Pro $pro)
    {
        return $this->render('@Caradvisor/Admin/Default/adminDetailEstabs.html.twig', [
            'pro'   => $pro,
        ]);
    }
}
