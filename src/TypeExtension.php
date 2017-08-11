<?php

namespace Brazanation\Doctrine;

use Doctrine\DBAL;

class TypeExtension
{
    private static $available = [
        'cpf' => Types\CpfType::class,
    ];

    public static function register(DBAL\Connection $connection)
    {
        foreach (self::$available as $typeName => $typeClass) {
            DBAL\Types\Type::addType($typeName, $typeClass);
            $connection->getDatabasePlatform()->registerDoctrineTypeMapping($typeName, $typeName);
        }
    }
}
