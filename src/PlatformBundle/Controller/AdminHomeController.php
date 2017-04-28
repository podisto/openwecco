<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 27/04/2017
 * Time: 18:06
 */

namespace PlatformBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminHomeController extends Controller
{
    public function indexAction(Request $request) {
        return $this->render("backend/dashboard/home.html.twig");
    }
}