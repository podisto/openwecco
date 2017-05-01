<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 01/05/2017
 * Time: 12:51
 */

namespace PlatformBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminPostController extends Controller
{
    public function indexAction(Request $request) {
        return $this->render('backend/posts/index.html.twig');
    }
}