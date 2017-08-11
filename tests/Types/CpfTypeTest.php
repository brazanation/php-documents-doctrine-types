<?php

namespace Brazanation\Doctrine\Tests\Types;

use Brazanation\Doctrine\Types\CpfType;
use Brazanation\Documents\Cpf;

class CpfTypeTest extends TestCase
{
    public function getTypeName()
    {
        return CpfType::NAME;
    }

    public function getTypeClass()
    {
        return CpfType::class;
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
        return ['length' => 11, 'fixed' => true];
    }
}
