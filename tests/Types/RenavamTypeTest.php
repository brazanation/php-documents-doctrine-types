<?php

namespace Brazanation\Doctrine\Tests\Types;

use Brazanation\Doctrine;
use Brazanation\Documents\Renavam;

class RenavamTypeTest extends TestCase
{
    public function getTypeName()
    {
        return Doctrine\DocumentType::RENAVAM;
    }

    public function getTypeClass()
    {
        return Doctrine\Types\RenavamType::class;
    }

    public function provideValidToDatabaseValue()
    {
        return [
            ['61855253306', new Renavam('61855253306')],
        ];
    }

    public function provideValidToPHPValue()
    {
        return [
            [new Renavam('61855253306'), '61855253306'],
        ];
    }

    public function provideValidSQLDeclaration()
    {
        return [
            'length' => Renavam::LENGTH,
            'fixed' => Doctrine\Types\RenavamType::FIELD_FIXED,
        ];
    }
}
