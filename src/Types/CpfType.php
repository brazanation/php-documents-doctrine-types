<?php

namespace Brazanation\Doctrine\Types;

use Brazanation\Doctrine\DocumentType;
use Brazanation\Documents\Cpf;

final class CpfType extends DocumentType
{
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
        return Cpf::LENGTH;
    }
}
