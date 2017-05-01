<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 01/05/2017
 * Time: 11:46
 */

namespace PlatformBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminTutorialController extends Controller
{
    public function indexAction(Request $request) {
        return $this->render('backend/tutorials/index.html.twig');
    }
}