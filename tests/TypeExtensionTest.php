<?php

namespace Brazanation\Doctrine\Tests;

use Brazanation\Doctrine\TypeExtension;
use Doctrine\DBAL;
use PHPUnit\Framework\TestCase;

class TypeExtensionTest extends TestCase
{
    /**
     * @test
     */
    public function registerAllTypes()
    {
        $platform = $this->prophesize(DBAL\Platforms\AbstractPlatform::class);
        $platform->registerDoctrineTypeMapping('cpf', 'cpf')->willReturn(null);

        $connection = $this->prophesize(DBAL\Connection::class);
        $connection->getDatabasePlatform()->willReturn($platform->reveal());

        TypeExtension::register($connection->reveal());

        $platform->registerDoctrineTypeMapping('cpf', 'cpf')->shouldBeCalled();

        $this->assertTrue(DBAL\Types\Type::hasType('cpf'));
    }
}
