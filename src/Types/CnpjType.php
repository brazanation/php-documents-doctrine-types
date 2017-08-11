<?php

namespace Brazanation\Doctrine\Types;

use Brazanation\Doctrine\DocumentType;
use Brazanation\Documents\Cnpj;

final class CnpjType extends DocumentType
{
    const FIELD_LENGTH = 14;
    const FIELD_FIXED = true;

    public function getName()
    {
        return DocumentType::CNPJ;
    }

    public function factory($number)
    {
        return new Cnpj($number);
    }

    public function getLength()
    {
        return self::FIELD_LENGTH;
    }

    public function isFixed()
    {
        return self::FIELD_FIXED;
    }
}
