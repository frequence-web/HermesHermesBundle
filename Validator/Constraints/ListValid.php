<?php

namespace Hermes\Bundle\HermesBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Checks that the list exists. Search by slug.
 */
class ListValid extends Constraint
{
    public $message = 'This list doesn\'t exists';

    public function validatedBy()
    {
        return 'list_valid';
    }
}
