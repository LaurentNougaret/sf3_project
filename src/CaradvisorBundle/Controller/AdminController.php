<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Admin;
use CaradvisorBundle\Form\AdminPassReset1Type;
use CaradvisorBundle\Form\AdminPassReset2Type;
use CaradvisorBundle\Entity\Pro;
use CaradvisorBundle\Form\AdminType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use CaradvisorBundle\Repository\ProRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
        return $this->render('@Caradvisor/Admin/Default/home.html.twig', array(
            'admin' => $this->getUser(),
        ));
    }

    // Change Password
    /**
     * @Route("/admin/password", name="admin_password_change")
     * @param Request $request
     * @return Response
     */
    public function changePasswordAction(Request $request)
    {
        $admin = new Admin();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(AdminPassReset1Type::class, $admin);
        $form->handleRequest($request);
        $message = "";
        if ($form->isSubmitted() && $form->isValid()){
            /** @var Admin $newAdmin */
            $newAdmin = $em->getRepository("CaradvisorBundle:Admin")->findOneBy(["email" => $admin->getEmail()]);
            if (null === $newAdmin){
                $message = "Nous n'avons pas trouvé cet utilisateur";
            } else {
                $newAdmin->setToken($newAdmin->generateToken());
                $dueDate = new \DateTime("now");
                $dueDate->add(new \DateInterval("P1D"));
                $newAdmin->setDateLimitToken($dueDate);
                $em->persist($newAdmin);
                $em->flush();
                $email = \Swift_Message::newInstance()
                    ->setSubject('Caradvisor : réinitialisation du mot de passe')
                    ->setFrom($this->getParameter('mailer_address'))
                    ->setTo($newAdmin->getEmail())
                    ->setBody(
                        $this->renderView("@Caradvisor/Mail/forgottenPassword.html.twig", [
                            "resetPasswordLink" => $this->generateUrl("admin_reset_password", [
                                "token" => $newAdmin->getToken(),
                            ],
                                UrlGeneratorInterface::ABSOLUTE_URL),
                        ]),
                        'text/html'
                    );
                $this->get('mailer')->send($email);
                $this->addFlash("notice-green", "Un mail a été envoyé à l'adresse de l'utilisateur.");
                return $this->redirectToRoute('dashboard');
            }
        }
        return $this->render("@Caradvisor/Admin/Default/adminPassReset1.twig", [
            "form" => $form->createView(),
            "email" => $admin->getEmail(),
            "message" => $message,
        ]);
    }

    /**
     * @param Request $request
     * @param string $token
     * @Route("/admin/reset/{token}", name="admin_reset_password")
     * @return Response
     */
    public function resetPasswordAction(Request $request, $token)
    {
        $em = $this->getDoctrine()->getManager();
        $admin = $em->getRepository("CaradvisorBundle:Admin")->findOneBy(["token" => $token]);
        $today = new \DateTime("now");
        if (null !== $admin && $admin->getDateLimitToken() > $today) {
            $admin->setPassword("");
            $form = $this->createForm(AdminPassReset2Type::class, $admin);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $password = $admin->getPlainPassword();
                $encoder = $this->get('security.password_encoder');
                $encoded = $encoder->encodePassword($admin, $password);
                $admin->setPassword($encoded);
                $admin->setDateLimitToken(null);
                $admin->setToken(null);
                $em->flush();
                $this->addFlash("notice-green", "Votre mot de passe a bien été modifié.");
                return $this->redirectToRoute("admin_login");
            }
            return $this->render("@Caradvisor/Admin/Default/adminPassReset2.twig", [
                "form" => $form->createView(),
            ]);
        } else {
            $this->addFlash("notice", "Cette demande de réinitialisation de mot de passe n'est pas valide.");
            return $this->redirectToRoute("admin_login");
        }
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
        $em->flush();
        return $this->redirectToRoute("admin_etabs", [
            'pros' => $pros
        ]);

    }
}
