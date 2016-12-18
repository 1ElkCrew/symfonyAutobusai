<?php

namespace AppBundle\Controller;

use AppBundle\Form\RouteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class AllController extends Controller
{
    /**
     * @Route("/edit", name="edit_page")
     */
    public function indexAction(Request $request){

        $routes = $this->getDoctrine()->getRepository("AppBundle:Route")->findAll();
        $stops = $this->getDoctrine()->getRepository("AppBundle:Stop")->findAll();
        $prices = $this->getDoctrine()->getRepository("AppBundle:Price")->findAll();
        return $this->render('editall/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'routes' => $routes,
            'stops' => $stops,
            'prices' => $prices,
        ]);
    }

    public function addRoute(){
        $route = new \AppBundle\Entity\Route();
        $form = $this->createForm(RouteType::class, $route)->add('add', SubmitType::class, ['label' => 'Add Route']);

        return $this->render("editall/index.html.twig", [
            'route' => $route,
            'form' => $form->createView(),
        ]);
    }

}
