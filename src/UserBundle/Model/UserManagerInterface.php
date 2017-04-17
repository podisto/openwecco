<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 17/04/2017
 * Time: 13:27
 */

namespace UserBundle\Model;


use Symfony\Component\Security\Core\User\UserInterface;

interface UserManagerInterface
{
    public function createUser();

    public function deleteUser(UserInterface $user);

    public function findUserBy(array $criteria);

    public function findUserByUsername($username);

    public function findUserByEmail($email);

    public function findUserByUsernameOrEmail($usernameOrEmail);

    public function findUserByConfirmationToken($token);

    public function findUsers();

    public function getClass();

    public function updateUser(UserInterface $user);

    public function updatePassword(UserInterface $user);
}