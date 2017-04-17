<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 17/04/2017
 * Time: 13:28
 */

namespace UserBundle\Model;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

abstract class UserManager implements UserManagerInterface
{
    private $encoderFactory;

    /**
     * UserManager constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->encoderFactory = $passwordEncoder;
    }

    public function createUser()
    {
        $class = $this->getClass();
        $user = new $class;

        return $user;
    }

    public function findUserByEmail($email)
    {
        return $this->findUserBy(array('email' => $email));
    }

    public function findUserByUsername($username)
    {
        return $this->findUserBy(array('username' => $username));
    }

    public function findUserByUsernameOrEmail($usernameOrEmail)
    {
        if (preg_match('/^.+\@\S+\.\S+$/', $usernameOrEmail))
            return $this->findUserByEmail($usernameOrEmail);

        return $this->findUserByUsername($usernameOrEmail);
    }

    public function findUserByConfirmationToken($token)
    {
        return $this->findUserBy(array('token' => $token));
    }

    public function updatePassword(UserInterface $user)
    {
        $user->setPassword($this->encoderFactory->encodePassword($user, $user->getPlainPassword()));
    }


}