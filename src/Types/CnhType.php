<?php

namespace Brazanation\Doctrine\Types;

use Brazanation\Doctrine\DocumentType;
use Brazanation\Documents\Cnh;

final class CnhType extends DocumentType
{
    const FIELD_FIXED = true;

    public function getName()
    {
        return DocumentType::CNH;
    }

    public function factory($number)
    {
        return new Cnh($number);
    }

    public function getLength()
    {
        return Cnh::LENGTH;
    }
}
