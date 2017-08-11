<?php

namespace Brazanation\Doctrine\Tests\Types;

use Brazanation\Doctrine;
use Brazanation\Documents\Cpf;

class CpfTypeTest extends TestCase
{
    public function getTypeName()
    {
        return Doctrine\DocumentType::CPF;
    }

    public function getTypeClass()
    {
        return Doctrine\Types\CpfType::class;
    }

    public function provideValidToDatabaseValue()
    {
        return [
            ['33252472538', new Cpf('33252472538')],
        ];
    }

    public function provideValidToPHPValue()
    {
        return [
            [new Cpf('33252472538'), '33252472538'],
        ];
    }

    public function provideValidSQLDeclaration()
    {
        return [
            'length' => Cpf::LENGTH,
            'fixed' => Doctrine\Types\CpfType::FIELD_FIXED,
        ];
    }
}
