<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 17/04/2017
 * Time: 17:25
 */

namespace UserBundle\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use UserBundle\Model\UserManager as BaseManager;

class UserManager extends BaseManager
{
    protected $objectManager;
    protected $class;
    protected $repository;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, ObjectManager $om, $class)
    {
        parent::__construct($passwordEncoder);
        $this->objectManager = $om;
        $this->repository = $om->getRepository($class);

        $metadata = $om->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    public function deleteUser(UserInterface $user)
    {
        $this->objectManager->remove($user);
        $this->objectManager->flush();
    }

    public function findUserBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    public function findUsers()
    {
        return $this->repository->findAll();
    }

    public function getClass()
    {
        return $this->class;
    }

    public function updateUser(UserInterface $user, $andFlush = true)
    {
        $this->updatePassword($user);
        $this->objectManager->persist($user);
        if ($andFlush)
            $this->objectManager->flush();
    }

}