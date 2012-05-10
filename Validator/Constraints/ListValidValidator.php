<?php

namespace Hermes\Bundle\HermesBundle\Validator\Constraints;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Validate list slugs
 *
 * @author Yohan Giarelli <yohan@frequence-web.fr>
 */
class ListValidValidator extends ConstraintValidator
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    public function validate($value, Constraint $constraint)
    {
        return $this->isValid($value, $constraint);
    }

    protected function isValid($value, Constraint $constraint)
    {
        $this->setMessage($constraint->message);
        $repo = $this->entityManager->getRepository('HermesHermesBundle:SubscriberList');
        if ($repo->findOneBy(array('slug' => $value))) {
            return true;
        }

        return false;
    }
}
