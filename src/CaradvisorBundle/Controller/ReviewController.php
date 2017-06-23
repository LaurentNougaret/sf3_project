<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Pro;
use CaradvisorBundle\Entity\ReviewBuy;
use CaradvisorBundle\Entity\ReviewRepair;
use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Form\ReviewBuyType;
use CaradvisorBundle\Form\ReviewRepairType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ReviewController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/review/repair", name="review_repair")
     */
    public function addReviewRepairAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_PART', null, 'Vous ne pouvez pas déposez d\'avis avec votre compte professionnel');

        $reviewRepair = new ReviewRepair();

        $form = $this->createForm(ReviewRepairType::class, $reviewRepair);
        $form->handleRequest($request);

        //$user = $this->getDoctrine()->getRepository(User::class);

        if ($form->isSubmitted() && $form->isValid()){
            $reviewRepair->setDateReview(new \DateTime());

            /** @var File $file */
            $file = $reviewRepair->getAttachedFile();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $targetDirectory = $this->getParameter('attachedfile_directory');
            $file->move($targetDirectory, $fileName);
            $reviewRepair->setAttachedFile($fileName);

            $em = $this->getDoctrine()->getManager();

            $dealerName = $form['dealerName']->getData();

            $repository = $this->getDoctrine()->getRepository(Pro::class);

            $pro = $repository->findByDealerName($dealerName);
            $reviewRepair->setPro($pro[0]);
            $reviewRepair->setUser($this->getUser());

            $em->persist($reviewRepair);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Reviews/repair.html.twig', [
            'form'          => $form->createView(),
            'reviewRepair'  => $reviewRepair,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/review/buy/new", name="review_new")
     */
    public function addReviewNewAction(Request $request) {
        $this->denyAccessUnlessGranted('ROLE_PART', null, 'Vous ne pouvez pas déposez d\'avis avec votre compte professionnel');

        $reviewBuy = new ReviewBuy();
        $form = $this->createForm(ReviewBuyType::class, $reviewBuy);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reviewBuy->setReviewBuyType('Neuf');
            $reviewBuy->setDateReview(new \DateTime());

            /** @var File $file */
            $file = $reviewBuy->getAttachedFile();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $targetDirectory = $this->getParameter('attachedfile_directory');
            $file->move($targetDirectory, $fileName);
            $reviewBuy->setAttachedFile($fileName);

            $em = $this->getDoctrine()->getManager();

            $dealerName = $form['dealerName']->getData();

            $repository = $this->getDoctrine()->getRepository(Pro::class);

            $pro = $repository->findByDealerName($dealerName);
            $reviewBuy->setPro($pro[0]);
            $reviewBuy->setUser($this->getUser());
            $reviewBuy->setWarranty(false);

            $em->persist($reviewBuy);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Reviews/buy.html.twig',[
            'form'      => $form->createView(),
            'reviewBuy' => $reviewBuy,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/review/buy/used", name="review_used")
     */
    public function addReviewUsedAction(Request $request) {
        $this->denyAccessUnlessGranted('ROLE_PART', null, 'Vous ne pouvez pas déposez d\'avis avec votre compte professionnel');

        $reviewBuy = new ReviewBuy();
        $form = $this->createForm(ReviewBuyType::class, $reviewBuy);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reviewBuy->setReviewBuyType('Neuf');
            $reviewBuy->setDateReview(new \DateTime());

            /** @var File $file */
            $file = $reviewBuy->getAttachedFile();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $targetDirectory = $this->getParameter('attachedfile_directory');
            $file->move($targetDirectory, $fileName);
            $reviewBuy->setAttachedFile($fileName);

            $em = $this->getDoctrine()->getManager();

            $dealerName = $form['dealerName']->getData();

            $repository = $this->getDoctrine()->getRepository(Pro::class);

            $pro = $repository->findByDealerName($dealerName);
            $reviewBuy->setPro($pro[0]);
            $reviewBuy->setUser($this->getUser());

            $em->persist($reviewBuy);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('@Caradvisor/Reviews/buy.html.twig',[
            'form'      => $form->createView(),
            'reviewBuy' => $reviewBuy,
        ]);
    }
}
