<?php

namespace Brazanation\Doctrine\Tests\Types;

use Brazanation\Doctrine;
use Brazanation\Documents\Cns;

class CnsTypeTest extends TestCase
{
    public function getTypeName()
    {
        return Doctrine\DocumentType::CNS;
    }

    public function getTypeClass()
    {
        return Doctrine\Types\CnsType::class;
    }

    public function provideValidToDatabaseValue()
    {
        return [
            ['242912018460005', new Cns('242912018460005')],
        ];
    }

    public function provideValidToPHPValue()
    {
        return [
            [new Cns('242912018460005'), '242912018460005'],
        ];
    }

    public function provideValidSQLDeclaration()
    {
        return [
            'length' => Cns::LENGTH,
            'fixed' => Doctrine\Types\CnsType::FIELD_FIXED,
        ];
    }
}
