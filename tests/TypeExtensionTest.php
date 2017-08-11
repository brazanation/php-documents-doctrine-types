<?php

namespace Brazanation\Doctrine\Tests;

use Brazanation\Doctrine\DocumentType;
use Brazanation\Doctrine\TypeExtension;
use Doctrine\DBAL;
use PHPUnit\Framework\TestCase;

class TypeExtensionTest extends TestCase
{
    private $expectedTypes = [
        DocumentType::CPF,
    ];

    /**
     * @test
     */
    public function registerAllTypes()
    {
        $platform = $this->prophesize(DBAL\Platforms\AbstractPlatform::class);

        foreach ($this->expectedTypes as $expectedType) {
            $platform->registerDoctrineTypeMapping($expectedType, $expectedType)->willReturn(null);
        }

        $connection = $this->prophesize(DBAL\Connection::class);
        $connection->getDatabasePlatform()->willReturn($platform->reveal());

        TypeExtension::register($connection->reveal());

        foreach ($this->expectedTypes as $expectedType) {
            $platform->registerDoctrineTypeMapping($expectedType, $expectedType)->shouldBeCalled();
            $this->assertTrue(DBAL\Types\Type::hasType($expectedType));
        }
    }
}
