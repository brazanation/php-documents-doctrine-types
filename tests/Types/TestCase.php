<?php

namespace Brazanation\Doctrine\Tests\Types;

use Doctrine\DBAL;
use Prophecy\Prophecy\ObjectProphecy;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ObjectProphecy
     */
    protected $platform;

    public function setUp()
    {
        $this->platform = $this->prophesize(DBAL\Platforms\AbstractPlatform::class);
        $refProp = new \ReflectionProperty(DBAL\Types\Type::class, '_typeObjects');
        $refProp->setAccessible(true);
        $refProp->setValue(null, []);

        $refProp = new \ReflectionProperty(DBAL\Types\Type::class, '_typesMap');
        $refProp->setAccessible(true);
        $refProp->setValue(null, []);
    }

    abstract public function getTypeName();

    abstract public function getTypeClass();

    abstract public function provideValidToDatabaseValue();

    abstract public function provideValidToPHPValue();

    abstract public function provideValidSQLDeclaration();

    protected function getType()
    {
        DBAL\Types\Type::addType($this->getTypeName(), $this->getTypeClass());

        return DBAL\Types\Type::getType($this->getTypeName());
    }

    /**
     * @test
     */
    public function shouldReturnName()
    {
        $type = $this->getType();
        $this->assertEquals($this->getTypeName(), $type->getName());
    }

    /**
     * @test
     */
    public function typeIsProperlyRegistered()
    {
        $this->assertFalse(DBAL\Types\Type::hasType($this->getTypeName()));

        DBAL\Types\Type::addType($this->getTypeName(), $this->getTypeClass());

        $this->assertTrue(DBAL\Types\Type::hasType($this->getTypeName()));
    }

    /**
     * @test
     * @dataProvider provideValidToDatabaseValue
     */
    public function convertToDatabaseValueParses($expectedValue, $testValue)
    {
        $type = $this->getType();

        $this->assertEquals($expectedValue, $type->convertToDatabaseValue($testValue, $this->platform->reveal()));
    }

    /**
     * @test
     */
    public function convertToDatabaseValueNull()
    {
        $type = $this->getType();

        $this->assertNull($type->convertToDatabaseValue(null, $this->platform->reveal()));
    }

    /**
     * @test
     * @dataProvider provideValidToPHPValue
     */
    public function convertToPHPValueWithValidValueReturnsParsedData($expectedValue, $testValue)
    {
        $type = $this->getType();

        $value = $type->convertToPHPValue($testValue, $this->platform->reveal());
        $this->assertEquals($expectedValue, $value);
    }

    /**
     * @test
     */
    public function convertToPHPValueWithNullReturnsNull()
    {
        $type = $this->getType();

        $value = $type->convertToPHPValue(null, $this->platform->reveal());
        $this->assertNull($value);
    }

    /**
     * @test
     */
    public function getSQLDeclaration()
    {
        $type = $this->getType();

        $expectedDeclaration = $this->provideValidSQLDeclaration();

        $this->platform->getVarcharTypeDeclarationSQL($expectedDeclaration)->willReturn(null);

        $type->getSQLDeclaration([], $this->platform->reveal());

        $this->platform->getVarcharTypeDeclarationSQL($expectedDeclaration)->shouldBeCalled();
    }
}
