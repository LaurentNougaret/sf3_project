<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Pro;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SearchController extends Controller
{
    /**
     * @Route("/find-dealername/{dealerName}", name="find_dealerName")
     * @param Request $request
     * @param $dealerName
     * @return JsonResponse
     */
    public function autoCompleteAction(Request $request, $dealerName)
    {
       if ($request->isXmlHttpRequest()) {
           $repository = $this->getDoctrine()->getRepository(Pro::class);

           $data = $repository->findProIdByName($dealerName);
           return new JsonResponse(['data' => json_encode($data)]);
       } else {
           throw new HttpException('500', 'Invalid Call');
       }
    }

    /**
     * @Route("/find-dealername/{city}", name="find_dealerName")
     * @param Request $request
     * @param $city
     * @return JsonResponse
     */
    public function searchProByCityAction(Request $request, $city)
    {
       if ($request->isXmlHttpRequest()) {
           $repository = $this->getDoctrine()->getRepository(Pro::class);

           $data = $repository->findProIdByCity($city);
           return new JsonResponse(['data' => json_encode($data)]);
       } else {
           throw new HttpException('500', 'Invalid Call');
       }
    }
}
