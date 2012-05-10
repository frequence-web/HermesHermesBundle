<?php

namespace Hermes\Bundle\HermesBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Gedmo\Mapping\Annotation as Gedmo;

/**
 * Hermes\Bundle\HermesBundle\Entity\SubscriberList
 * Contains subscribers who are stored by mongodb
 *
 * @ORM\Table(name="subscriber_list")
 * @ORM\Entity()
 */
class SubscriberList
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * Determine if the list is accessible or not
     * @var boolean $public
     *
     * @ORM\Column(name="public", type="boolean", nullable=true)
     */
    protected $public;

    /**
     * @Gedmo\Slug(fields={"name"}, updatable=false, unique=true)
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    protected $slug;

    /**
     * @var FOS\UserBundle\Entity\Group
     *
     * @ORM\ManyToOne(targetEntity="Client")
     */
    protected $client;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return SubscriberList
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     * @return SubscriberList
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return text
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set public
     *
     * @param boolean $public
     * @return SubscriberList
     */
    public function setPublic($public)
    {
        $this->public = $public;
        return $this;
    }

    /**
     * Get public
     *
     * @return boolean
     */
    public function isPublic()
    {
        return $this->public;
    }

    /**
     * Get public
     *
     * @return boolean
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return SubscriberList
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set client
     *
     * @param FOS\UserBundle\Entity\Group $client
     * @return SubscriberList
     */
    public function setClient(\FOS\UserBundle\Entity\Group $client = null)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Get client
     *
     * @return FOS\UserBundle\Entity\Group
     */
    public function getClient()
    {
        return $this->client;
    }
}
