<?php

namespace PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
//        $userManager = $this->get('ow_user.usermanager');
//        $user = $userManager->createUser();
//        var_dump($user); die;
        return $this->render('platform/index.html.twig');
    }
}
