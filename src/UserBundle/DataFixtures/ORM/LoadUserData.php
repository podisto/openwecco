<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 16/04/2017
 * Time: 22:37
 */

namespace UserBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use UserBundle\Entity\User;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname("El Hadji Omar");
        $user->setLastname("Dione");
        $user->setUsername("podisto");
        $user->setEmail("omardione1991@gmail.com");
        $user->setPassword($this->container->get('security.password_encoder')->encodePassword($user, "Od1991passer"));
        $user->setIsActive(true);
        $user->setRoles(array('ROLE_ADMIN', 'ROLE_USER'));
        $manager->persist($user);
        $manager->flush();
    }

}