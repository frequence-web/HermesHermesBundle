<?php

namespace Hermes\Bundle\HermesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use FOS\UserBundle\Entity\Group;

/**
 * @ORM\Table(name="client")
 * @ORM\Entity()
 */
class Client extends Group
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
