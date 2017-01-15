<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Price;
use AppBundle\Entity\Stop;
use AppBundle\Form\PriceType;
use AppBundle\Form\RouteType;
use AppBundle\Form\StopType;
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
     *  DELETE
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

    /*
     *  EDIT
     */

    /**
     * @Route("editRoute/{route}", name="edit_route")
     * @param Route $route
     */
    public function editRouteAction(Request $request, \AppBundle\Entity\Route $route){
        $form = $this->createForm(RouteType::class, $route)
            ->add('edit', SubmitType::class, ['label' => 'Submit Edit']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("edit_page");
        }
        return $this->render("editall/editRoute.html.twig", [
            'route' => $route,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("editPrice/{price}", name="edit_price")
     * @param Price $price
     */
    public function editPriceAction(Request $request, Price $price){
        $form = $this->createForm(PriceType::class, $price)
            ->add('edit', SubmitType::class, ['label' => 'Submit Edit']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("edit_page");
        }
        return $this->render("editall/editPrice.html.twig", [
            'price' => $price,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("editStop/{stop}", name="edit_stop")
     * @param Stop $stop
     */
    public function editStopAction(Request $request, Stop $stop){
        $form = $this->createForm(StopType::class, $stop)
            ->add('edit', SubmitType::class, ['label' => 'Submit Edit']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("edit_page");
        }
        return $this->render("editall/editStop.html.twig", [
            'stop' => $stop,
            'form' => $form->createView(),
        ]);
    }

    /*
     *  ADD
     */

    /**
     * @Route("addRoute/add", name="add_route")
     * @param Request $request
     * @return Response
     */
    public function addRoute(Request $request){
        $route = new \AppBundle\Entity\Route();
        $form = $this->createForm(RouteType::class, $route)->add('add', SubmitType::class, ['label' => 'Add Route']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($route);
            $em->flush();
            return $this->redirectToRoute("edit_page");
        }
        return $this->render("editall/add.html.twig", [
            'route' => $route,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("addPrice/add", name="add_price")
     * @param Request $request
     * @return Response
     */
    public function addPrice(Request $request){
        $price = new Price();
        $form = $this->createForm(PriceType::class, $price)->add('add', SubmitType::class, ['label' => 'Add Price']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($price);
            $em->flush();
            return $this->redirectToRoute("edit_page");
        }
        return $this->render("editall/add.html.twig", [
            'price' => $price,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("addStop/add", name="add_stop")
     * @param Request $request
     * @return Response
     */
    public function addStop(Request $request){
        $stop = new Stop();
        $form = $this->createForm(StopType::class, $stop)->add('add', SubmitType::class, ['label' => 'Add Stop']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stop);
            $em->flush();
            return $this->redirectToRoute("edit_page");
        }
        return $this->render("editall/add.html.twig", [
            'stop' => $stop,
            'form' => $form->createView(),
        ]);
    }
}
