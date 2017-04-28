<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 17/04/2017
 * Time: 19:01
 */

namespace UserBundle\Mailer;


use Symfony\Component\Security\Core\User\UserInterface;

interface MailerInterface
{
    public function sendConfirmationEmailMessage(UserInterface $user);
}