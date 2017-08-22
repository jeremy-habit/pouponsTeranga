<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use MainBundle\Entity\User;

/**
 * Class LoadUserData
 * @package MainBundle\DataFixtures\ORM
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setUsername('Christian');
        $user->setEmail('christian@gmail.com');
        $user->setEnabled(1);
        $user->addRole("ROLE_ADMIN");
        $user->setPlainPassword("mdp");
        $manager->persist($user);
        $this->addReference('refChristian', $user);

        /*execution*/
        $manager->flush();

    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 0;
    }
}
