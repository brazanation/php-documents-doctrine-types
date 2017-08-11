<?php

namespace Brazanation\Doctrine\Types;

use Brazanation\Doctrine\DocumentType;
use Brazanation\Documents\Renavam;

final class RenavamType extends DocumentType
{
    const FIELD_FIXED = true;

    public function getName()
    {
        return DocumentType::RENAVAM;
    }

    public function factory($number)
    {
        return new Renavam($number);
    }

    public function getLength()
    {
        return Renavam::LENGTH;
    }
}
