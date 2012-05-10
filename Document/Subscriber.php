<?php

namespace Hermes\Bundle\HermesBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
    Gedmo\Mapping\Annotation as Gedmo;

/**
 * Hermes\Bundle\HermesBundle\Entity\Subscriber
 * Contains subscribers who are stored by mongodb
 *
 * @MongoDB\Document(collection="subscriber")
 */
class Subscriber
{
    /**
     * @var string $id
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @var string $email
     *
     * @MongoDB\String
     */
    protected $email;

    /**
     * @var string $locale
     *
     * @MongoDB\String
     */
    protected $locale;

    /**
     * @var string $list
     *
     * @MongoDB\String
     */
    protected $list;

    /**
    * @var array
    *
    * @MongoDB\Hash
    */
    protected $params;

    /**
     * @var \DateTime $createdAt
     * @Gedmo\Timestampable(on="create")
     * @MongoDB\Date
     */
    protected $createdAt;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set locale
     *
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * Get locale
     *
     * @return string $locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set list
     *
     * @param string $list
     */
    public function setList($list)
    {
        $this->list = $list;
        return $this;
    }

    /**
     * Get list
     *
     * @return string $list
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Add a param
     *
     * @param string $param
     */
    public function addParam($key, $value)
    {
        $this->params[$key] = $value;
        return $this;
    }

    /**
     * Add an array of params
     *
     * @param array $params
     */
    public function addParams($params)
    {
        if(!is_array($params)) {
            return $this;
        }
        if(!is_array($this->params)) {
            $this->params = array();
        }
        $this->params = array_merge($this->params, $params);

        return $this;
    }

    /**
     * Get params
     *
     * @return string $params
     */
    public function getParams()
    {
        return $this->params;
    }
}
