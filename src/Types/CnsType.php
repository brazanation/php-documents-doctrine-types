<?php

namespace Brazanation\Doctrine\Types;

use Brazanation\Doctrine\DocumentType;
use Brazanation\Documents\Cns;

final class CnsType extends DocumentType
{
    const FIELD_FIXED = true;

    public function getName()
    {
        return DocumentType::CNS;
    }

    public function factory($number)
    {
        return new Cns($number);
    }

    public function getLength()
    {
        return Cns::LENGTH;
    }
}
