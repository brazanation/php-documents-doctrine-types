<?php

namespace Brazanation\Doctrine\Types;

use Brazanation\Doctrine\DocumentType;
use Brazanation\Documents\Cpf;

final class CpfType extends DocumentType
{
    const FIELD_LENGTH = 11;
    const FIELD_FIXED = true;

    public function getName()
    {
        return DocumentType::CPF;
    }

    public function factory($number)
    {
        return new Cpf($number);
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
