<?php

namespace Hermes\Bundle\HermesBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Hermes\Bundle\HermesBundle\Entity\Template
 * Contains templates who are stored by mongodb
 *
 * @MongoDB\Document(
 *  collection="template",
 *  repositoryClass="Hermes/Bundle/HermesBundle/Document/Repository/TemplateRepository"
 * )
 */
class Template implements \ArrayAccess, \IteratorAggregate
{

  /**
   * @var string
   *
   * @MongoDB\Id
   */
  protected $id;

  /**
   * @var string
   *
   * @MongoDB\String
   */
  protected $parent;

  /**
   * @var array
   *
   * @MongoDB\Hash
   */
  protected $blocks;

  public function getId()
  {
    return $this->id;
  }

  public function addBlock($name, $block)
  {
    $this->blocks[$name] = $block;
  }

  public function getBlock($name)
  {
    return $this->blocks[$name];
  }

  public function setBlocks($blocks)
  {
    $this->blocks = $blocks;
  }

  public function getBlocks()
  {
    return $this->blocks;
  }

  public function setParent($parent)
  {
    $this->parent = $parent;
  }

  public function getParent()
  {
    return $this->parent;
  }

  /**
   * @{inheritDoc}
   */
  public function offsetExists($offset)
  {
    return isset($this->blocks[$offset]);
  }

  /**
   * @{inheritDoc}
   */
  public function offsetGet($offset)
  {
    return $this->getBlock($offset);
  }

  /**
   * @{inheritDoc}
   */
  public function offsetSet($offset, $value)
  {
    $this->addBlock($offset, $value);
  }

  /**
   * @{inheritDoc}
   */
  public function offsetUnset($offset)
  {
    unset($this->blocks[$offset]);
  }

  /**
   * @{inheritDoc}
   */
  public function getIterator()
  {
    return new \ArrayIterator($this->blocks);
  }
}
