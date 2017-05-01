<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 01/05/2017
 * Time: 12:58
 */

namespace PlatformBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminCategoryController extends Controller
{
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $datenow = new \DateTime();
        $categories = $em->getRepository("PlatformBundle:Category")->findAll();
        return $this->render('backend/categories/index.html.twig', array(
            'categories' => $categories,
            'datenow' => $datenow
        ));
    }
}