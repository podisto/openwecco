<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 17/04/2017
 * Time: 19:02
 */

namespace UserBundle\Mailer;


use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\User\UserInterface;

class Mailer implements MailerInterface
{
    protected $twig;
    protected $mailer;

    /**
     * Mailer constructor.
     * @param \Twig_Environment $twig
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Twig_Environment $twig, \Swift_Mailer $mailer)
    {
        $this->twig = $twig;
        $this->mailer = $mailer;
    }


    public function sendConfirmationEmailMessage(UserInterface $user)
    {

        $body = $this->renderTemplate($user->getUsername());
        $message = \Swift_Message::newInstance()
            ->setSubject("Hello Email")
            ->setFrom("omardione1991@gmail.com")
            ->setTo("contactezsimba@gmail.com")
            ->setBody($body, 'text/html')
        ;
//        $data['image_src'] = $message->embed(\Swift_Image::fromPath($this->requestStack->getCurrentRequest()->getBasePath()));
        if (!$message instanceof \Swift_Mime_Message)
            throw new Exception('Expected Swift_Mime_Message, %s given', get_class($message));

        $this->mailer->send($message);
    }

    public function renderTemplate($username) {
        return $this->twig->render('registration/email.html.twig', array(
            'username' => $username
        ));
    }
}