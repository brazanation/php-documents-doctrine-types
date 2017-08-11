<?php

namespace Brazanation\Doctrine\Tests\Types;

use Brazanation\Doctrine;
use Brazanation\Documents\Cnh;

class CnhTypeTest extends TestCase
{
    public function getTypeName()
    {
        return Doctrine\DocumentType::CNH;
    }

    public function getTypeClass()
    {
        return Doctrine\Types\CnhType::class;
    }

    public function provideValidToDatabaseValue()
    {
        return [
            ['83592802666', new Cnh('83592802666')],
        ];
    }

    public function provideValidToPHPValue()
    {
        return [
            [new Cnh('83592802666'), '83592802666'],
        ];
    }

    public function provideValidSQLDeclaration()
    {
        return [
            'length' => Cnh::LENGTH,
            'fixed' => Doctrine\Types\CnhType::FIELD_FIXED,
        ];
    }
}
