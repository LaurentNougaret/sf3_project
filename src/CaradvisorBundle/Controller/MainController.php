<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Contact;
use CaradvisorBundle\Entity\ReviewRepair;
use CaradvisorBundle\Form\ContactType;
use CaradvisorBundle\Form\ReviewRepairType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $reviews = $this->getDoctrine()->getRepository('CaradvisorBundle:Review')->findAll();
        return $this->render('@Caradvisor/Default/home.html.twig', [
            'reviews' => $reviews,
        ]);
    }
    /**
     * @Route("/results", name="results")
     */
    public function resultAction()
    {
        return $this->render('@Caradvisor/Default/results.html.twig');
    }
    /**
     * @Route("/info", name="info")
     */
    public function infoAction()
    {
        return $this->render('@Caradvisor/Default/info.html.twig');
    }
    /**
     * @Route("/review/new", name="review_new")
     */
    public function reviewNewAction()
    {
        return $this->render('@Caradvisor/Reviews/new.html.twig');
    }
    /**
     * @Route("/review/used", name="review_used")
     */
    public function reviewUsedAction()
    {
        return $this->render('@Caradvisor/Reviews/used.html.twig');
    }
    /**
     * @param Request $request
     * @return Response
     * @Route("/review/repair", name="review_repair")
     */
    public function addReviewRepairAction(Request $request)
    {
        $reviewRepair = new ReviewRepair();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ReviewRepairType::class, $reviewRepair);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $em->persist($reviewRepair);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Reviews/repair.html.twig', [
            'form'  => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/contact", name="contact")
     */
    public function addContactAction(Request $request)
    {
        $contact = new Contact();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('home');

        }
        return $this->render('@Caradvisor/Default/contact.html.twig', [
            'form'  =>  $form->createView(),
        ]);
    }

    /**
     * @Route("/legal", name="legal")
     */
    public function legalAction()
    {
        return $this->render('@Caradvisor/Default/legal.html.twig');
    }
    /**
     * @Route("/cgu", name="cgu")
     */
    public function cguAction()
    {
        return $this->render('@Caradvisor/Default/cgu.html.twig');
    }
}
