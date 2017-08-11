<?php

namespace Brazanation\Doctrine\Tests\Types;

use Brazanation\Doctrine;
use Brazanation\Documents\Cnpj;

class CnpjTypeTest extends TestCase
{
    public function getTypeName()
    {
        return Doctrine\DocumentType::CNPJ;
    }

    public function getTypeClass()
    {
        return Doctrine\Types\CnpjType::class;
    }

    public function provideValidToDatabaseValue()
    {
        return [
            ['49367159000138', new Cnpj('49367159000138')],
        ];
    }

    public function provideValidToPHPValue()
    {
        return [
            [new Cnpj('49367159000138'), '49367159000138'],
        ];
    }

    public function provideValidSQLDeclaration()
    {
        return [
            'length' => Cnpj::LENGTH,
            'fixed' => Doctrine\Types\CnpjType::FIELD_FIXED,
        ];
    }
}
