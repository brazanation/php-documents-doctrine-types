<?php

namespace Brazanation\Doctrine\Types;

use Brazanation\Doctrine\DocumentType;
use Brazanation\Documents\PisPasep;

final class PisPasepType extends DocumentType
{
    const FIELD_FIXED = true;

    public function getName()
    {
        return DocumentType::PISPASEP;
    }

    public function factory($number)
    {
        return new PisPasep($number);
    }

    public function getLength()
    {
        return PisPasep::LENGTH;
    }
}
