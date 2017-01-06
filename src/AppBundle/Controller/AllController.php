<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Price;
use AppBundle\Entity\Stop;
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

    /*
    public function addRoute(){
        $route = new \AppBundle\Entity\Route();
        $form = $this->createForm(RouteType::class, $route)->add('add', SubmitType::class, ['label' => 'Add Route']);

        return $this->render("editall/index.html.twig", [
            'route' => $route,
            'form' => $form->createView(),
        ]);
    }
    */

    /**
     * @Route("deleteRoute/{route}", name="delete_route")
     * @param Route $route
     */
    public function deleteRouteAction(Request $request, \AppBundle\Entity\Route $route){
        $form = $this->createFormBuilder()->add('delete', SubmitType::class, ['label' => "Yes"])->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->remove($route);
            $em->flush();
            return $this->redirectToRoute("edit_page");
        }
        return $this->render('editall/deleteRoute.html.twig',[
            'route' => $route,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("deleteStop/{stop}", name="delete_stop")
     * @param Stop $stop
     */
    // TODO: FOREIGN KEY FIX
    public function deleteStopAction(Request $request, Stop $stop){
        $form = $this->createFormBuilder()->add('delete', SubmitType::class, ['label' => "Yes"])->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->remove($stop);
            $em->flush();
            return $this->redirectToRoute('edit_page');
        }
        return $this->render('editall/deleteStop.html.twig',[
            'stop' => $stop,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("deletePrice/{price}", name="delete_price")
     * @param Price $price
     */
    public function deletePriceAction(Request $request, Price $price){
        $form = $this->createFormBuilder()->add('delete', SubmitType::class, ['label' => "Yes"])->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->remove($price);
            $em->flush();
            return $this->redirectToRoute('edit_page');
        }
        return $this->render('editall/deletePrice.html.twig',[
            'price' => $price,
            'form' => $form->createView(),
        ]);
    }
}
