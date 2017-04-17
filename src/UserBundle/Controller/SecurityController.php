<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 16/04/2017
 * Time: 18:00
 */

namespace UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    public function loginAction() {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED'))
            return $this->redirectToRoute('ow_homepage');

        $authenticationUtils = $this->get('security.authentication_utils');
        return $this->render(':security:login.html.twig', array(
            'last_username'     =>  $authenticationUtils->getLastUsername(),
            'error'             =>  $authenticationUtils->getLastAuthenticationError(),
        ));
    }
}