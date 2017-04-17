<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 16/04/2017
 * Time: 18:48
 */

namespace UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;
use UserBundle\Form\UserType;

class RegistrationController extends Controller
{
    public function registerAction(Request $request) {
//        $user = new User();
        $userManager = $this->get('ow_user.usermanager');
        $user = $userManager->createUser();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($userManager->updatePassword($user));
            $user->setIsActive(false);
            $userManager->updateUser($user);
            /*$password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();*/
//            $this->addFlash('notice', "")
            return $this->redirectToRoute('user_login');
        }
        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );
    }
}