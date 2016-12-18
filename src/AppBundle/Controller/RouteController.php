<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RouteController extends Controller
{
    /**
     * @Route("/", name="route")
     */
    public function indexAction(Request $request){

        $routes = $this->getDoctrine()->getRepository("AppBundle:Route")->findAll();

        return $this->render('editall/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'routes' => $routes,
        ]);
    }
}
