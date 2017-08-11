<?php

namespace Brazanation\Doctrine\Tests\Types;

use Brazanation\Doctrine;
use Brazanation\Documents\PisPasep;

class PisPasepTypeTest extends TestCase
{
    public function getTypeName()
    {
        return Doctrine\DocumentType::PISPASEP;
    }

    public function getTypeClass()
    {
        return Doctrine\Types\PisPasepType::class;
    }

    public function provideValidToDatabaseValue()
    {
        return [
            ['51823129491', new PisPasep('51823129491')],
        ];
    }

    public function provideValidToPHPValue()
    {
        return [
            [new PisPasep('51823129491'), '51823129491'],
        ];
    }

    public function provideValidSQLDeclaration()
    {
        return [
            'length' => PisPasep::LENGTH,
            'fixed' => Doctrine\Types\PisPasepType::FIELD_FIXED,
        ];
    }
}
