<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Admin;
use CaradvisorBundle\Entity\UserProfile;
use CaradvisorBundle\Form\AdminType;
use CaradvisorBundle\Entity\ReviewBuy;
use CaradvisorBundle\Entity\ReviewRepair;
use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use CaradvisorBundle\Entity\Answer;
use CaradvisorBundle\Entity\Pro;
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
        if ($form->isSubmitted() && $form->isValid()) {
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
     * @Route ("/admin/reviews/{page}", name="admin_reviews")
     * @param int $page
     * @return Response
     */

    public function listAdminReviews($page = 1)
    {
        $repo = $this->getDoctrine()->getRepository('CaradvisorBundle:ReviewBuy');
        $repos = $this->getDoctrine()->getRepository('CaradvisorBundle:ReviewRepair');
        $maxResults = 7;
        $userCount = $repo->totalUsers();

        $pagination = [
            'page'          => $page,
            'route'         => 'admin_reviews',
            'pages_count'    => ceil($userCount / $maxResults),
            'route_params'  => [],
        ];

        $reviewsBuy = $repo->listReviewBuy($page, $maxResults);
        $reviewsRepair = $repos->listReviewRepair($page, $maxResults);

        return $this->render('@Caradvisor/Admin/Default/adminReviews.html.twig', [
            'reviewsBuy'      => $reviewsBuy,
            'reviewsRepair'   => $reviewsRepair,
            'pagination'      => $pagination
        ]);
    }

    /**
     * @Route("/admin/reviews/activate-review-buy/{reviewBuy}", name="activate_review_buy")
     * @param ReviewBuy $reviewBuy
     * @return Response
     */
    public function activateBuyAction(ReviewBuy $reviewBuy)
    {
        $em = $this->getDoctrine()->getManager();
        $reviewBuy->setIsActive(true);
        $em->flush();
        return $this->redirectToRoute("admin_reviews", [
            'reviewBuy' => $reviewBuy

        ]);
    }

    /**
     * @Route("/admin/reviews/activate-review-repair/{reviewRepair}", name="activate_review_repair")
     * @param ReviewRepair $reviewRepair
     * @return Response
     */
    public function activateRepairAction(ReviewRepair $reviewRepair)
    {
        $em = $this->getDoctrine()->getManager();
        $reviewRepair->setIsActive(true);
        $em->flush();
        return $this->redirectToRoute("admin_reviews", [
            'reviewRepair' => $reviewRepair
        ]);
    }

    /**
     * @Route("/admin/reviews/detail-buy/{reviewBuy}", name="detail_review_buy")
     * @param ReviewBuy $reviewBuy
     * @return Response
     */
    public function detailReviewBuyAction(ReviewBuy $reviewBuy)
    {
        return $this->render('@Caradvisor/Admin/Default/adminDetailReviewBuy.html.twig', [
            'reviewBuy' => $reviewBuy
        ]);
    }

    /**
     * @Route("/admin/reviews/detail-repair/{reviewRepair}", name="detail_review_repair")
     * @param ReviewRepair $reviewRepair
     * @return Response
     */
    public function detailReviewRepairAction(ReviewRepair $reviewRepair)
    {
        return $this->render('@Caradvisor/Admin/Default/adminDetailReviewRepair.html.twig', [
            'reviewRepair' => $reviewRepair
        ]);
    }

    /**
     * @Route("/admin/users/{page}", name="admin_users")
     * @param int $page
     * @return Response
     */
    public function listUsersAction($page = 1)
    {
        $repo = $this->getDoctrine()->getRepository('CaradvisorBundle:User');
        $maxResults = 5;
        $userCount = $repo->totalUsers();

        $pagination = [
            'page'          => $page,
            'route'         => 'admin_users',
            'pages_count'    => ceil($userCount / $maxResults),
            'route_params'  => [],
        ];

        $users = $repo->listUser($page, $maxResults);

        return $this->render('@Caradvisor/Admin/Default/adminListUsers.html.twig', [
                'users'      => $users,
                'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/admin/users/detail/{user}", name="detail_user")
     * @param User $user
     * @return Response
     */
    public function detailuserAction(User $user)
    {
        return $this->render('@Caradvisor/Admin/Default/adminDetailUsers.html.twig', [
            'user'        => $user,
            'userProfile' => $user->getUserProfile()
        ]);
    }

    /**
     * @Route("/admin/users/desactivate/{user}", name="desactivate_user")
     * @param User $user
     * @return Response
     */
    public function desactivateUserAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $user->setIsActive(false);
        $em->flush();
        return $this->redirectToRoute("admin_users", [
            'user' => $user
        ]);
    }

    /**
     * @Route("/admin/users/activate/{user}", name="activate_user")
     * @param User $user
     * @return Response
     */
    public function activateUserAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $user->setIsActive(true);
        $em->flush();
        return $this->redirectToRoute("admin_users", [
            'user' => $user
        ]);
    }
}
