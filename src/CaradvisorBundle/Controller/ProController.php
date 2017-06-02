<?php

//namespace CaradvisorBundle\Controller;
//
//use CaradvisorBundle\Entity\Answer;
//use CaradvisorBundle\Entity\Pro;
//use CaradvisorBundle\Entity\ReviewRepair;
//use CaradvisorBundle\Entity\User;
//use CaradvisorBundle\Entity\Vehicle;
//use CaradvisorBundle\Form\AnswerType;
//use CaradvisorBundle\Form\ProProfileType;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Component\HttpFoundation\Request;
//
//class ProController extends Controller
//{
//    /**
//     * @Route("/pro/{pro}", name="pro")
//     * @param Pro $pro
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
//    public function indexAction(Pro $pro)
//    {
//        return $this->render('@Caradvisor/Pro/home.html.twig', [
//            "pro" => $pro,
//        ]);
//    }
//    /**
//     * @Route("/pro/signup", name="pro_signup")
//     */
//    public function signupAction()
//    {
//        return $this->render('@Caradvisor/Pro/signup.html.twig');
//    }
//
//    /**
//     * @Route("/pro/profile/{pro}", name="pro_profile")
//     * @param Request $request
//     * @param Pro $pro
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
//    public function profileAction(Request $request, Pro $pro)
//    {
//        $newpro = new Pro();
//        $form = $this->createForm(ProProfileType::class, $newpro);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($newpro);
//            $em->flush();
//
//            return $this->redirectToRoute('pro');
//        }
//        return $this->render('@Caradvisor/Pro/profile.html.twig', [
//            "form" => $form->createView(),
//            "pro" => $pro
//        ]);
//    }
//
//    /**
//     * @Route("/pro/establishments/{pro}", name="pro_establishments")
//     * @param User $user
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
//    public function establishmentsAction( User $user)
//    {
//        return $this->render('@Caradvisor/Pro/establishments.html.twig', [
//            'data' => $user->getPros(),
//            'user' => $user
//        ]);
//    }
//
//
//
//
//   /* /**
//     * @Route("/pro/establishments/reviews/answer/{user}/{pro}", name="answer")
//     * @param User $user
//     * @param Pro $pro
//     * @param ReviewRepair $reviewRepair
//     * @param Request $request
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
//   /* public function answerAction(User $user, Pro $pro, ReviewRepair $reviewRepair ,Request $request)
//    {
//        $answer = new Answer();
//        $em = $this->getDoctrine()->getManager();
//        $form = $this->createForm(AnswerType::class, $answer);
//
//
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $answer->setPro($pro);
//            $type = $request->request->get('type');
//            $id = $request->request->get('id');
//            if ($type == 'repair') {
//                $repair = $em->getRepository('CaradvisorBundle:ReviewRepair')->find($id);
//                $answer->setReviewRepair($repair);
//            }
//            if ($type == 'buy') {
//                $buy = $em->getRepository('CaradvisorBundle:ReviewBuy')->find($id);
//                $answer->setReviewBuy($buy);
//            }
//            $em->persist($answer);
//            $em->flush();
//        }
//        return $this->render('answerReviewEstab.html.twig', [
//            'user' => $user,
//            'pro' => $pro,
//            'reviewrepair' => $reviewRepair,
//            'form' =>$form->createView(),
//        ]);
//    }*/
//
//
//
//
//    /**
//     * @Route("/pro/settings/{pro}", name="pro_settings")
//     * @param Pro $pro
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
//    public function settingsAction(Pro $pro)
//    {
//        return $this->render('@Caradvisor/Pro/settings.html.twig', [
//            'pro' => $pro
//        ]);
//    }
//
//    /**
//     * @Route("/pro/settings/password/{pro}", name="pro_password")
//     * @param Pro $pro
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
//    public function passwordAction(Pro $pro)
//    {
//        return $this->render('@Caradvisor/Pro/password.html.twig', [
//        "pro" => $pro,
//        ]);
//    }
//}
